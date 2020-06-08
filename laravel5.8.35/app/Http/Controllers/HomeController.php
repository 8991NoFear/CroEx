<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Parner;
use App\Product;
use App\User;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['showCheckoutForm']);
    }

    public function index()
    {
        $user       = Auth::guard('web')->user();
        $parners    = Parner::all();
        // $users      = User::where('review', '<>', 'null')->get();

        return view('welcome', [
            'user'      => $user,
            'parners'   => $parners,
            // 'users'     => $users,
        ]);
    }

    public function showAllProducts()
    {
        $now = date("Y-m-d H:m:i");
        $products   = Product::where('expired', '>=', $now)
            ->where('quantity', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        $user       = Auth::guard('web')->user();

        return view('products.index', [
            'products'  => $products,
            'user'      => $user,
        ]);
    }

    public function search(Request $request)
    {
        // doesn't work i don't know why
        // $products = DB::select('
        //     SELECT * FROM products
        //     WHERE name like "%?%"',
        //     array($request->search)
        // );

        $now = date("Y-m-d H:m:i");
        $products = Product::where('expired', '>=', $now)
            ->where('quantity', '>', 0)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        // dd($products);
        return view('products.search', [
            'products' => $products,
        ]);
    }

    public function showCheckoutForm(Product $product)
    {
        // it doesn't work i dont't know why
        // $this->middleware('auth');

        $user = auth()->user();
        return view('products.checkout', [
            'product' => $product,
            'user'    => $user,
        ]);
    }
}
