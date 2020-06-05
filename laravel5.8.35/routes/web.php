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

Route::get('/', 'HomeController@index')->name('home');

// Auth::routes();

Route::get('/products/search', 'HomeController@search');
Route::get('/products', 'HomeController@showAllProducts')->name('products');
Route::get('/products/{product}', 'HomeController@showCheckoutForm')->name('checkout');
Route::post('/products', 'UserController@checkout')->name('checkout.submit');


Route::prefix('user')->group(function () {
    //
    Route::get('edit', 'UserController@edit')->name('user.edit');
    Route::post('edit', 'UserController@update')->name('user.update');
    Route::get('exchange', 'UserController@showExchangeForm')->name('user.exchange');
    Route::post('exchange', 'UserController@submitExchange')->name('user.exchange.submit');
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/bag/search', 'UserController@search');
    Route::get('/bag', 'UserController@showBag')->name('bag');

    // Authentication Routes...
    Route::get('login', [
      'as' => 'login',
      'uses' => 'Auth\LoginController@showLoginForm'
    ]);
    Route::post('login', [
      'as' => '',
      'uses' => 'Auth\LoginController@login'
    ]);
    Route::get('logout', [
      'as' => 'logout',
      'uses' => 'Auth\LoginController@userLogout'
    ]);

    // Password Reset Routes...
    Route::post('password/email', [
      'as' => 'password.email',
      'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('password/reset', [
      'as' => 'password.request',
      'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/reset', [
      'as' => 'password.update',
      'uses' => 'Auth\ResetPasswordController@reset'
    ]);
    Route::get('password/reset/{token}', [
      'as' => 'password.reset',
      'uses' => 'Auth\ResetPasswordController@showResetForm'
    ]);

    // Registration Routes...
    Route::get('register', [
      'as' => 'register',
      'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);
    Route::post('register', [
      'as' => '',
      'uses' => 'Auth\RegisterController@register'
    ]);
});

Route::prefix('admin')->group(function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('product', 'AdminController@showCreateProductForm')->name('admin.product');
    Route::post('product', 'AdminController@createProduct')->name('admin.product.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('parner')->group(function () {
    Route::get('create', 'ParnerController@create')->name('parner.create');
    Route::post('create', 'ParnerController@store')->name('parner.store');
});
