
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
		// Nhom Route cho trang admin/product- by Duong Dong Hung
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'product'],function(){
		Route::get('listproduct','ProductController@listProduct')->name('admin');
		Route::get('addproduct','ProductController@getaddProduct');
        Route::post('addproduct','ProductController@postaddProduct');
        Route::get('editproduct/{id}','ProductController@geteditProduct');
        Route::post('editproduct/{id}','ProductController@posteditProduct');
        Route::get('deleteproduct/{id}','ProductController@deleteProduct');
	});
		//CRUD category by Phan Anh Khoa
	Route::group(['prefix'=>'category'],function(){
		Route::get('listcategories', 'CategoryController@listCategories');
		Route::get('addcategories','CategoryController@getAddCategories');
        Route::post('addcategories','CategoryController@postAddCategories');
		Route::get('editcategories/{id}', 'CategoryController@getEditCategories');
		Route::post('editcategories/{id}', 'CategoryController@postEditCategories');
		Route::get('deletecategories/{id}', 'CategoryController@deleteCategories');
	});
		//CRUD brand by Phan Anh Khoa
	Route::group(['prefix'=>'brand'],function(){
		Route::get('listbrands', 'BrandController@listBrands');
		Route::get('addbrands', 'BrandController@getAddBrand');
		Route::post('addbrands', 'BrandController@postAddBrand');
		Route::get('editbrands/{id}', 'BrandController@getEditBrands');
		Route::post('editbrands/{id}', 'BrandController@postEditBrands');
		Route::get('deletebrands/{id}', 'BrandController@deleteBrands');
	});
		//manage user by Phan Anh Khoa
	Route::group(['prefix'=>'user'],function(){
		Route::get('listusers', 'UserController@listUsers');
		Route::get('editusers/{id}', 'UserController@getEditUsers');
		Route::post('editusers/{id}', 'UserController@postEditUsers');
		Route::get('deleteusers/{id}', 'UserController@deleteUsers');
		Route::get('searchusers', 'UserController@searchUser');
	});
		//Route Menu
	Route::group(['prefix'=>'menu'],function(){
		Route::GET('manager-menu','menuController@listMenu')->name('listmenu');
		Route::GET('add-menu','menuController@createMenu');
		Route::POST('createMenu','menuController@saveMenu');
		Route::GET('edit-menu/{id}','menuController@editMenu');
		Route::POST('edit-menu/updateMenu','menuController@updateMenu');
		Route::GET('delete-menu/{id}','menuController@deleteMenu');
	});
});
