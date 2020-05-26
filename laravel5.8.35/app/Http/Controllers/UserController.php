<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Parner;
use Illuminate\Support\Facades\DB;
use App\ParnerUserTransaction;
use App\Product;
use App\ProductUserTransaction;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('/');
    }


    public function showExchangeForm()
    {
        $parners = Parner::all();
        return view('users.exchange', [
            'parners' => $parners,
        ]);
    }

    public function submitExchange(Request $request)
    {

        // validate data
        $data = $this->validate($request, [
            'type_exchange' => ['required', 'boolean'],
            'parner' => ['required', 'string'],
            'exchange_point' => ['required', 'numeric']
        ]);

        // check if user exists in parner
        $parner = Parner::where('name', $data['parner'])->first();
        $user = Auth::guard()->user();
        $parner_user = DB::table($parner->name)->where('email', $user->email)->first();

        if (empty($parner_user)) {
            // redirect back with error
            return redirect()->back()->with('msg', 'you have not registered with that parner!');
        }

        $tran = new ParnerUserTransaction;
        $tran->user_id = $user->id;
        $tran->parner_id = $parner->id;
        $tran->parner_user_id = $parner_user->id;
        $tran->exchange_type = $data['type_exchange'];
        $tran->exchange_point = $data['exchange_point'];

        // TH1: croex ==> parner
        if ($data['type_exchange'] == 0) {
            if ($data['exchange_point'] > $user->point) {
                return redirect()->back()->with('msg', 'your croex points is not enought!');
            }

            $user->point -= $data['exchange_point'];
            $parner_user->point += $data['exchange_point'];

        }
        // TH2: parner ==> croex
        else {
            if ($data['exchange_point'] > $parner_user->point) {
                return redirect()->back()->with('msg', 'your ' . $parner->name . ' point is not enought!');
            }

            $user->point += $data['exchange_point'];
            $parner_user->point -= $data['exchange_point'];
        }

        // save in database
        $tran->save();
        $user->save();
        DB::table($parner->name)->where('email', $user->email)->update(['point' => $parner_user->point]);

        return redirect()->back()->with('msg', 'exchange point successfully!');
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed'],
            'image' => '',
            'review' => '',
        ]);

        $user->password = Hash::make($data['password']);

        if ($request->name !== $user->name) {
            $data = $request->validate([
                'name' => ['unique:users'],
                'email' => '',
                'password' => '',
                'image' => '',
                'review' => '',
            ]);
            $user->name = $data['name'];
        }

        if ($request->email !== $user->email) {
            $data = $request->validate([
                'name' => '',
                'email' => ['unique:users'],
                'password' => [''],
                'image' => '',
                'review' => '',
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

    public function showCheckoutForm(Product $product)
    {
        return view('product.checkout', [
            'product' => $product,
            'user' => auth()->guard()->user();
        ]);
    }

    public function checkout()
    {
        $data = $this->validate([
            'product_id' => 'required',
            'exchange_type' => 'boolean',
        ]);

        $product = Product::find($data['product_id']);
        $user = auth()::guard()->user();
        $product_user_transaction = new ProductUserTransaction;

        $product_user_transaction->user_id = $user->id;
        $product_user_transaction->product_id = $product->id;
        $product_user_transaction->exchange_type = $data[exchange_type];
        $product_user_transaction->exchange_point = 0;

        if ($data[exchange_type] == 0) {
            $user->point += $product->bonus_point;
            $product_user_transaction->exchange_point = $product->bonus_point;
        }

        return view('thankyou');
    }
}
