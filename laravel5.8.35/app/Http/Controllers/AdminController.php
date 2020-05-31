<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

use App\Parner;
use App\Product;
use App\Code;

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
        // time
        $day    = date('d');
        $month  = date('m');
        $year   = date('Y');
        $date   = date('Y-m-d');

        // tien thu duoc tu ban voucher thang nay
        $productMoneyThisMonth              = $this->productMoneyAtMonth($month, $year);

        // tien thu duoc tu chiet khau doi diem thang nay
        $discountMoneyThisMonth             = $this->discountMoneyAtMonth($month, $year);

        // tien thu duoc hang thang
        $monthlyMoney                       = $this->monthlyMoney();

        // ti le tien thang nay
        $ratioThisMonthMoney                = $this->ratioThisMonthMoney($month, $year);

        // so giao dich mua voucher thang nay
        $numberOfVoucherTransactions        = $this->numberOfVoucherTransactions($month, $year);

        // so giao dich doi diem thang nay
        $numberOfExchangingTransactions     = $this->numberOfExchangingTransactions($month, $year);

        // gui data thong ke duoc ra dashboard
        return view('admins.admin', [
            'productMoneyThisMonth'             => $productMoneyThisMonth,
            'discountMoneyThisMonth'            => $discountMoneyThisMonth,
            'numberOfVoucherTransactions'       => $numberOfVoucherTransactions,
            'numberOfExchangingTransactions'    => $numberOfExchangingTransactions,
            'ratioThisMonthMoney'               => $ratioThisMonthMoney,
            'monthlyMoney'                      => $monthlyMoney ,
        ]);
    }

    public function showCreateProductForm()
    {
        $parners = Parner::all();
        return view('admins.product', [
            'parners' => $parners,
        ]);
    }

    public function createProduct(Request $request)
    {
        $data = $this->validate($request, [
            'parner_name'   => 'required',
            'name'          => 'required|unique:products',
            'bonus_point'   => 'numeric',
            'image1'        => 'required|image',
            'image2'        => 'required|image',
            'image3'        => 'required|image',
            'price'         => 'numeric',
            'quantity'      => 'numeric',
            'description'   => 'required|string',
            'expired'       => 'required|date'
        ]);

        DB::transaction(function () use ($data) {
            // upload image
            $data['image1'] = $data['image1']->store('products', 'public');
            $data['image2'] = $data['image2']->store('products', 'public');
            $data['image3'] = $data['image3']->store('products', 'public');

            // create product
            $product = Product::create($data);

            // fake codes
            factory(Code::class, (int) $data['quantity'])->create(['product_id' => $product->id]);
        });

        return redirect()->back()->with('msg', 'create product successfully!');
    }

    // tien hang thang
    public function monthlyMoney()
    {
        // thu tien tu ban san pham
        $moneyFromSelling = [100, 200, 300, 400, 500, 600];

        // thu tien tu trao doi diem
        $moneyFromDiscounting = [100, 200, 300, 400, 500, 600];

        // cong tong lai theo moi thang
        return array_map(function ($a, $b) {
                return $a + $b;
            },
            $moneyFromSelling,
            $moneyFromDiscounting
        );

    }

    // tien thu duoc tu ban voucher thang nay
    public function productMoneyAtMonth($month, $year)
    {
        $money = DB::select('
        SELECT sum(products.price) as total from products, product_user_transactions
        WHERE products.id = product_user_transactions.product_id
            AND month(product_user_transactions.created_at) = ?
            AND year(product_user_transactions.created_at) = ?', [$month, $year])[0]->total;

        return $money;
    }

    // tien thu duoc tu chiet khau doi diem thang nay
    public function discountMoneyAtMonth($month, $year)
    {
        $money = DB::select('
        SELECT sum(parner_user_transactions.discount) as total from users, parner_user_transactions
        WHERE users.id = parner_user_transactions.user_id
            AND month(parner_user_transactions.created_at) = ?
            AND year(parner_user_transactions.created_at) = ?', [$month, $year])[0]->total;

        return $money;
    }

    // so giao dich mua voucher thang nay
    public function numberOfVoucherTransactions($month, $year)
    {
        $number = DB::select('
        SELECT count(*) as total from products, product_user_transactions
        WHERE products.id = product_user_transactions.product_id
            AND month(product_user_transactions.created_at) = ?
            AND year(product_user_transactions.created_at) = ?', [$month, $year])[0]->total;

        return $number;
    }

    // so giao dich doi diem thang nay
    public function numberOfExchangingTransactions($month, $year)
    {
        $number = DB::select('
        SELECT count(*) as total from users, parner_user_transactions
        WHERE users.id = parner_user_transactions.user_id
            AND month(parner_user_transactions.created_at) = ?
            AND year(parner_user_transactions.created_at) = ?', [$month, $year])[0]->total;

        return $number;
    }

    // ty le
    public function ratioThisMonthMoney($month, $year)
    {
        $productMoney           = $this->productMoneyAtMonth($month, $year);
        $discountMoney          = $this->discountMoneyAtMonth($month, $year);

        $productPercentage      = floor(($productMoney / ($productMoney + $discountMoney) * 100));
        $discountPercentage     = 100 - $productPercentage;

        return [$productPercentage, $discountPercentage];
    }
}
