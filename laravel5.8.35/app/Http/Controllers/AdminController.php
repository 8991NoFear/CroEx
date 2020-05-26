<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{

    public function __construct()
    {
        // @author: ledinhbinh
        $this->middleware('auth:admin');
        //
    }

    public function index()
    {
        // moi ngay co bao nhieu giao dich doi diem
        $excTransPerDay = DB::table('parner_user_transactions')->select('create_at', DB:raw('count(*) as total'))->groupBy('create_at')->get();

        // moi ngay co bao nhieu giao dich mua hang
        $buyTransPerDay = DB::table('product_user_transactions')->select('create_at', DB:raw('count(*) as total'))->groupBy('create_at')->get();

        // gui data thong ke duoc ra dashboard
        return view('admins.admin', [
            '$exTransPerDay' => $excTransPerDay,
            '$buyTransPerDay' => $buyTransPerDay,
        ]);
    }

    public function showCreateCategoriesForm()
    {
        return view('admins.category');
    }

    public function createCategories()
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'description' => '',
        ]);

        Category::create($data);

        return redirect()->back->with('msg', 'create category successfully!');
    }

    public function showCreateProductForm()
    {
        return view('admins.product');
    }

    public function createProduct()
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'description' => '',
            'price' => 'numeric',
            'quantity' => 'numeric',
            'bonus_point' => 'numeric',
            'category_name' => ['string', 'unique:categories'],
        ]);

        Product::create($data);

        return redirect()->back->with('msg', 'create product successfully!');
    }


}
