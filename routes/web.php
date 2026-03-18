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

Route::get('product/displaygrid','App\Http\Controllers\productController@displayGrid')
->name('products.displaygrid');

Route::get('product/additem/{id}','App\Http\Controllers\productController@additem')
->name('products.additem');
