<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', '\App\Http\Controllers\CategoriesController@index');
Route::post('/categories/store', '\App\Http\Controllers\CategoriesController@store');
Route::post('/categories/update/{id}','\App\Http\Controllers\CategoriesController@update');
Route::get('/categories/delete/{id}', '\App\Http\Controllers\CategoriesController@destroy');

Route::get('/product', '\App\Http\Controllers\ProductsController@index');
Route::post('/produk/store', '\App\Http\Controllers\ProductsController@store');
Route::post('/product/update/{id}','\App\Http\Controllers\ProductsController@update');
Route::get('/product/delete/{id}', '\App\Http\Controllers\ProductsController@destroy');

Route::post('/product/select', '\App\Http\Controllers\ProductsController@select');
Route::post('/product/payment', '\App\Http\Controllers\ProductsController@pay');

Route::get('/report', '\App\Http\Controllers\ReportController@index');
Route::post('/report/month', '\App\Http\Controllers\ReportController@month');
Route::post('/report/date', '\App\Http\Controllers\ReportController@date');

Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index');