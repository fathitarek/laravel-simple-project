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

Route::get('/x', function () {
    return view('front.index');
});

// Route::get('/detail', function () {
//     return view('front.detail');
// });


Route::get('/shop/{id}',"ShopFrontController@index");
Route::get('/detail/{id}',"ShopFrontController@detail");