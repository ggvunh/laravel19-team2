
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
Route::get('timkiem-sp', 'PageController@searchsp');
Route::get('xem_chitiet/{id}&{category_id}', 'PageController@xem_chitiet');
Route::get('category_id/{category_id}', 'PageController@viewis_category');
Route::get('search-is-price', 'PageController@search_is_price');
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
//Route Menu
Route::GET('maneger-menu','menuController@listMenu')->name('listmenu');
Route::GET('add-menu','menuController@createMenu');
Route::POST('createMenu','menuController@saveMenu');
Route::GET('edit-menu/{id}','menuController@editMenu');
Route::POST('edit-menu/updateMenu','menuController@updateMenu');
Route::GET('delete-menu/{id}','menuController@deleteMenu');
