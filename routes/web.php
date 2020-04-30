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

Auth::routes();
Route::get('/', function(){
	return redirect()->route('items.index');
});
Route::resource('/items', 'ItemController');
Route::resource('/categories', 'CategoryController');
Route::resource('/cart', 'CartController');
Route::resource('/myAccount', 'MyAccountController');
Route::get('/items_list', 'ItemController@items_list');