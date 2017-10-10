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
Route::get('/', 'PageController@getIndex');
Route::get('san-pham', 'PageController@getSanPham');
Route::get('chi-tiet-sp', 'PageController@getChiTiet');
Route::get('gio-hang', 'PageController@getGioHang');
// Route::get('login', 'PageController@login');
Route::get('searchsp', 'PageController@searchsp');
Route::get('view_chitiet/{id}', 'PageController@view_chitiet');
Route::get('sanpham/{id}', 'PageController@viewsp_category');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Nhom Route cho trang admin/product- by Duong Dong Hung
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'product'],function(){
		Route::get('listproduct','PageController@listProduct');

		Route::get('addcategory','PageController@getaddCategory');
        Route::post('addcategory','PageController@postaddCategory');

		Route::get('addproduct','PageController@getaddProduct');
        Route::post('addproduct','PageController@postaddProduct');

        Route::get('editproduct/{id}','PageController@geteditProduct');
        Route::post('editproduct/{id}','PageController@posteditProduct');

        Route::get('deleteproduct/{id}','PageController@deleteProduct');


	});
});
