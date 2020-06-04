<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Parner;
use App\Product;

use Illuminate\Support\Facades\DB;

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
            'user'      => $user,
            'parners'   => $parners,
        ]);
    }

    public function showAllProducts()
    {
        $products   = Product::paginate(1);
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

        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();

        // dd($products);
        return view('products.search', [
            'products' => $products,
        ]);
    }

    public function showCheckoutForm(Product $product)
    {
        return view('products.checkout', [
            'product' => $product,
        ]);
    }
}
