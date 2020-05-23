<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user', 'UserController@index')->name('user.dashboard');

Route::prefix('admin')->group(function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('parner')->group(function () {
    Route::get('login', 'Auth\ParnerLoginController@showLoginForm')->name('parner.login');
    Route::post('login', 'Auth\ParnerLoginController@login')->name('parner.login.submit');
    Route::get('logout', 'Auth\ParnerLoginController@logout')->name('parner.logout');
    Route::get('/', 'ParnerController@index')->name('parner.dashboard');
});
