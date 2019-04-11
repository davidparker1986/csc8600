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
Route::get('/dashboard', 'DashboardController@index');
Route::get ('/account', 'DashboardController@account');
Route::post('/account', 'DashboardController@update');

Route::resource('/admin', 'AdminController');
Route::resource('/cart', 'CartsController');
Route::resource('/feedback', 'FeedbacksController');
Route::resource('/invoice', 'InvoicesController');
Route::resource('/order', 'OrdersController');
Route::resource('/product', 'ProductsController');
Auth::routes();

