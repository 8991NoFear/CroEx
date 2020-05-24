<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Parner;


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

}
