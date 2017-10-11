
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

Route::get('/', 'PageController@getIndex');
Route::get('san-pham', 'PageController@getSanPham');
Route::get('chi-tiet-sp', 'PageController@getChiTiet');
Route::get('gio-hang', 'PageController@getGioHang');
Route::get('searchsp', 'PageController@searchsp');
Route::get('view_chitiet/{id}', 'PageController@view_chitiet');
Route::get('sanpham/{id}', 'PageController@viewsp_category');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'PageController@getAdmin')->name('admin');
// Nhom Route cho trang admin/product- by Duong Dong Hung
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'product'],function(){
		Route::get('listproduct','ProductController@listProduct');
		Route::get('addcategory','ProductController@getaddCategory');
        Route::post('addcategory','ProductController@postaddCategory');
		Route::get('addproduct','ProductController@getaddProduct');
        Route::post('addproduct','ProductController@postaddProduct');
        Route::get('editproduct/{id}','ProductController@geteditProduct');
        Route::post('editproduct/{id}','ProductController@posteditProduct');
        Route::get('deleteproduct/{id}','ProductController@deleteProduct');
	});
});
