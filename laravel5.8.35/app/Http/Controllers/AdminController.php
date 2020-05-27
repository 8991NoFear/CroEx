<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

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
        // ngay hom nay ban duoc bao nhieu tien???
        $todayArrFormat = array(date('Y-m-d'));
        $moneyToday = DB::select('select sum(products.price) as total from products, product_user_transactions where products.id = product_user_transactions.product_id and date(product_user_transactions.created_at) = ?', $todayArrFormat)[0]->total;

        // ngay hom nay co bao nhieu giao dich doi diem???
        $exchangeToday = DB::select('select count(*) as total from parner_user_transactions where date(created_at) = ?', $todayArrFormat)[0]->total;

        $orderToday = DB::select('select count(*) as total from product_user_transactions where date(created_at) = ?', $todayArrFormat)[0]->total;

        $requestToday = DB::select('select count(*) as total from requests where date(created_at) = ?', $todayArrFormat)[0]->total;

        // dd($moneyToday);

        // gui data thong ke duoc ra dashboard
        return view('admins.admin', [
            'moneyToday' => $moneyToday,
            'exchangeToday'=> $exchangeToday,
            'orderToday' => $orderToday,
            'requestToday'=> $requestToday,
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
