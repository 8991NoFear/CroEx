<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Parner;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $user = Auth::guard()->user();
        $parners = Parner::all();
        return view('welcome', [
            'user' => $user,
            'parners' => $parners,
        ]);
    }

    public function showAllProducts()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

}
