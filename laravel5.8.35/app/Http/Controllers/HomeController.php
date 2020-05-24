<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $actor = $this->getCurrentUser();
        return view('welcome', [
            'actor' => $actor,
        ]);
    }

    public function getCurrentUser()
    {
        if (Auth::guard()->check()) {
            return Auth::guard()->user();
        } elseif (Auth::guard('admin')->check()) {
            return Auth::guard('admin')->user();
        } elseif (Auth::guard('parner')->check()) {
            return Auth::guard('parner')->user();
        } else {
            return null;
        }
    }

}
