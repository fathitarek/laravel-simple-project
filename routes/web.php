<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

// Route::prefix('category')->group(function () {
//     Route::get('/index','CategoryController@index');
//     Route::get('/add','CategoryController@create');
//     Route::post('/store','CategoryController@store');
//     Route::get('/show/{id}','CategoryController@show');
//     Route::get('/delete/{id}','CategoryController@destroy');
//     Route::get('/edit/{id}','CategoryController@edit');
//     Route::post('/update','CategoryController@update');
// });

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::get('add_to_cart/{product_id}', 'CartController@addToCart');
Route::get('carts', 'CartController@getCartByUser');
Route::get('delete_cart/{id}', 'CartController@deleteFromCart');
Route::get('update_qty/{id}/{qty}', 'CartController@updateQty');
Route::get('checkout', 'CheckoutController@getCartByUser');
Route::post('odder', 'CheckoutController@order')->name('checkout.order');

Route::get('search', 'ShopFrontController@search');



Route::get('/x', function () {
    return view('front.index');
});



Route::get('/shop/{id}',"ShopFrontController@index");
Route::get('/detail/{id}',"ShopFrontController@detail");
Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
