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

// Route::get('/user', 'UserController@index')->name('user.dashboard');
// Route::get('/user/edit', 'UserController@edit')->name('user.edit');

Route::get('/test', function () {
    return view('users.test');
});

Route::prefix('user')->group(function () {
    //
    Route::get('edit', 'UserController@edit')->name('user.edit');
    Route::post('edit', 'UserController@update')->name('user.update');
    Route::get('/', 'UserController@index')->name('user.dashboard');

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

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('parner')->group(function () {
    Route::get('login', 'Auth\ParnerLoginController@showLoginForm')->name('parner.login');
    Route::post('login', 'Auth\ParnerLoginController@login')->name('parner.login.submit');
    Route::get('logout', 'Auth\ParnerLoginController@logout')->name('parner.logout');

    Route::get('edit', 'ParnerController@edit')->name('parner.edit');
    Route::post('edit', 'ParnerController@edit@update')->name('parner.update');
    Route::get('/', 'ParnerController@index')->name('parner.dashboard');
});
