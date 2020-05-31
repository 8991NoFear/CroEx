<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Parner;
use App\Product;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $user       = Auth::guard('web')->user();
        $parners    = Parner::all();

        return view('welcome', [
            'user' => $user,
            'parners' => $parners,
        ]);
    }

    public function showAllProducts()
    {
        $products   = Product::all();
        $user       = Auth::guard('web')->user();

        return view('products.index', [
            'products' => $products,
                'user' => $user,
        ]);
    }

    public function showCheckoutForm(Product $product)
    {
        return view('products.checkout', [
            'product' => $product,
        ]);
    }
}
