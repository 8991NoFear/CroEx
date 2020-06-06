<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Parner;
use App\Code;
use Illuminate\Support\Facades\DB;
use App\ParnerUserTransaction;
use App\Product;
use App\ProductUserTransaction;
use App\Events\ExchangePoint;
use App\Events\Purchase;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('home');
    }

    public function dashboard()
    {
        $user = auth()->guard('web')->user();

        return view('users.dashboard', [
            'user' => $user,
        ]);
    }

    public function showBag(Request $request)
    {
        $user       = auth()->guard('web')->user();
        $allCodes   = $user->codes;

        // manual pagination
        $total          = $allCodes->count();
        $perPage        = 3;
        $currentPage    = $request->page ?? 1;
        $start          = ($currentPage * $perPage) - $perPage;
        $slice          = $allCodes->slice($start, $perPage);

        $codes          = new Paginator($slice, $total, $perPage, $currentPage, [
                            'path'  => $request->url(),
                            'query' => $request->query(),
                        ]);

        return view('users.bag', [
            'user'  => $user,
            'codes' => $codes,
        ]);
    }

    public function search(Request $request)
    {
        $codes = auth()->user()->codes;

        // get relationship properties
        foreach ($codes as $code) {
            $code->product;
        }

        // search in product of code
        $filtered = $codes->filter(function ($code) use ($request) {
            $subject = $code->product->name;
            $pattern =  '/' . $request->search . '/';

            return preg_match($pattern, $subject);
        });

        return view('users.search', [
            'codes' => $filtered,
        ]);
    }


    public function showExchangeForm()
    {
        $parners = Parner::all();
        $user = auth()->guard('web')->user();

        return view('users.exchange', [
            'parners' => $parners,
            'user' => $user,
        ]);
    }

    public function submitExchange(Request $request)
    {
        // discount
        $discount = 0.05;

        // validate data
        $data = $this->validate($request, [
            'type'     => ['required', 'boolean'],
            'parner'   => ['required', 'string'],
            'point'    => ['required', 'numeric']
        ]);

        // check if user exists in parner
        $parner         = Parner::where('name', $data['parner'])->first();
        $user           = Auth::guard()->user();
        $parner_user    = DB::table($parner->name)->where('email', $user->email)->first();

        if (empty($parner_user)) {
            // redirect back with error
            return redirect()->back()->with('parner', 'you have not registered with that parner!');
        }

        // check if transaction is valid
        if (
            ($data['type']  == 0 ) &&
            ($data['point'] > $user->point)
        ) {
            return redirect()->back()->with('point', 'your croex points is not enought!');
        } elseif (
            ($data['type']  == 1 ) &&
            ($data['point'] > $parner_user->point)
        ) {
            return redirect()->back()->with('point', 'your ' . $parner->name . ' point is not enought!');
        }

        // do transaction
        $ntfmsg = $this->exchangePointTransaction($data, $parner, $user, $parner_user, $discount);

        // dispath event
        ExchangePoint::dispatch($ntfmsg);

        return redirect()->back()->with('success', 'exchange point successfully!');
    }

    public function edit()
    {
        $user = Auth::guard()->user();
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        $user = Auth::guard()->user();

        // validate data
        $data = $request->validate([
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'password'  => ['required', 'string', 'confirmed'],
            'image'     => 'image',
            'review'    => '',
        ]);

        $user->password = Hash::make($data['password']);

        if ($request->name !== $user->name) {
           $data = $request->validate([
               'name'      => ['unique:users'],
               'email'     => '',
               'password'  => '',
               'image'     => '',
               'review'    => '',
           ]);
           $user->name = $data['name'];
       }

       if ($request->email !== $user->email) {
            $data = $request->validate([
                'name'      => '',
                'email'     => ['unique:users'],
                'password'  => [''],
                'image'     => '',
                'review'    => '',
            ]);
            $user->email = $data['email'];
        }

        if (isset($request->image)) {
            $user->avatar = $request->image->store('users', 'public');
        }

        if (isset($request->review)) {
            $user->review = $data['review'];
        }

        $user->save();

        return redirect()->route('logout');
    }

    public function showActivity()
    {
        $parner_user_tran = ParnerUserTransaction::all();
        return view('activity', [
            'transaction' => $parner_user_tran,
        ]);
    }

    public function checkout(Request $request)
    {
        // validate data
        $request->validate([
            'type' => '',
        ]);

        if (!isset($request->type)) {
            $request->type = 2;
        } else {
            $request->type = 3;
        }

        // transaction

        // dd($request->type);

        DB::transaction(function () use ($request) {
            $code = Code::where([
                        ['product_id', "=", $request->product_id],
                    ])->whereNull('user_id')->first();

            $user                       = auth()->guard('web')->user();
            $product_user_transaction   = new ProductUserTransaction;

            $code->user_id = $user->id;
            $code->buy_at  = date("Y-m-d h:i:s");

            $product_user_transaction->user_id          = $user->id;
            $product_user_transaction->product_id       = $code->product_id;
            $product_user_transaction->code_id          = $code->id;
            $product_user_transaction->type             = $request->type;

            $bonus = $code->product->bonus_point;
            $price = $code->product->price;

            if ($request->type == 2) {
                $product_user_transaction->point        = $bonus;
                $user->point                           += $bonus;
                $ntfmsg['type']                         = $request->type;
                $ntfmsg['point']                        = $bonus;
            } else {
                $product_user_transaction->point        = 0;
                $user->point                           -= $price;
                $ntfmsg['type']                         = $request->type;
                $ntfmsg['point']                        = $price;
            }

            $product            = Product::find($code->product->id);
            $product->quantity -= 1;
            // disable all timestamps field
            $product->timestamps = false;

            $product_user_transaction->save();
            $code->save();
            $user->save();
            $product->save();

            // dispatch
            Purchase::dispatch($ntfmsg);

        });

        return view('users.thankyou', [
            'msg' => 'purchase successfully!!! Your coupon is in your bag now',
        ]);
    }

    public function exchangePointTransaction($data, $parner, $user, $parner_user, $discount)
    {
        // notification message
        $ntfmsg;

        // transaction
        DB::transaction(function () use ($data, $parner, $user, $parner_user, $discount, &$ntfmsg) {
            $tran                   = new ParnerUserTransaction;
            $tran->user_id          = $user->id;
            $tran->parner_id        = $parner->id;
            $tran->parner_user_id   = $parner_user->id;
            $tran->type             = $data['type'];
            $tran->point            = $data['point'];

            $change                 = floor($tran->point * (1 - $discount));
            $tran->discount         = $tran->point - $change;

            // TH1: croex ==> parner
            if ($data['type'] == 0) {
                $user->point            -= $data['point'];
                $parner_user->point     += $change;

                $ntfmsg['point']         = $data['point'];
                $ntfmsg['type']          = 0;
            }
            // TH2: parner ==> croex
            else {
                $user->point           += $change;
                $parner_user->point    -= $data['point'];

                $ntfmsg['point']        = $change;
                $ntfmsg['type']         = 1;
            }

            // save in database
            $tran->save();
            $user->save();
            DB::table($parner->name)->where('email', $user->email)->update(['point' => $parner_user->point]);
        });

        return $ntfmsg;
    }
}
