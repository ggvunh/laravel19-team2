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
Route::post('searchsp', 'PageController@searchsp');
Route::get('view_chitiet/{id}', 'PageController@view_chitiet');
Route::get('sanpham/{id}', 'PageController@viewsp_category');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
