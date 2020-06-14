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

// Route::get('/', function () {
//     return view('index');
// });


// Produk Master
Route::get('/', 'Produk_controller@index');
Route::get('/produk', 'Produk_controller@index');
Route::get('/produk/create', 'Produk_controller@create');
Route::post('/produk', 'Produk_controller@store');
Route::delete('produk/{produk_model}', 'Produk_controller@destroy');
Route::get('produk/{produk_model}/edit', 'Produk_controller@edit');
Route::patch('produk/{produk_model}', 'Produk_controller@update');

// Customer Master
Route::get('/customer', 'Customer_controller@index');
Route::get('/customer/create', 'Customer_controller@create');
Route::get('/customer/{customer_model}/edit', 'Customer_controller@edit');
Route::post('/customer', 'Customer_controller@store');
Route::delete('/customer/{customer_model}', 'Customer_controller@destroy');
Route::patch('/customer/{customer_model}', 'Customer_controller@update');

// Category Master
Route::get('/category', 'Category_controller@index');
Route::get('/category/create', 'Category_controller@create');
Route::get('/category/{category_model}/edit', 'Category_controller@edit');
Route::post('/category', 'Category_controller@store');
Route::delete('/category/{category_model}', 'Category_controller@destroy');
Route::patch('/category/{category_model}', 'Category_controller@update');

// Transaksi Penjualan
Route::get('/penjualan', 'Penjualan_controller@index');
Route::get('/penjualan/create', 'Penjualan_controller@create');
Route::get('/penjualan/{penjualan_model}','Penjualan_controller@show');
Route::post('/penjualan', 'Penjualan_controller@store');
Route::post('/penjualan/cekout', 'Penjualan_controller@cek');
Route::delete('/penjualan/{penjualan_model}', 'Penjualan_controller@destroy');
