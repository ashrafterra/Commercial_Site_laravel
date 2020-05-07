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
Route::get('/filters', 'FilterController@filters');
Route::post('/filters/1', 'FilterController@show');
Route::resource('/cart', 'CartController');
Route::resource('/myAccount', 'MyAccountController');