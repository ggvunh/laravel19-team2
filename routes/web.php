
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

Route::get('/', 'PageController@getIndex')->name('home');
Route::get('san-pham', 'PageController@getSanPham')->name('homeproduct');
Route::get('timkiem-sp', 'PageController@searchsp')->name('homesearch');
Route::get('xem_chitiet/{id}&{category_id}', 'PageController@xem_chitiet');
Route::get('category_id/{category_id}', 'PageController@viewis_category');
Route::get('search-is-price', 'PageController@search_is_price');
Route::get('xemdonhang','CartController@xemdonhang');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'PageController@getAdmin')->name('admin')->middleware('adminLogin');
// Nhom Route cho trang admin/product- by Duong Dong Hung
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'product'],function(){
        Route::get('listproduct','ProductController@listProduct');
        Route::get('addcategory','ProductController@getaddCategory');
        Route::post('addcategory','ProductController@postaddCategory');
        Route::get('addproduct','ProductController@getaddProduct');
        Route::post('addproduct','ProductController@postaddProduct');
        Route::get('editproduct/{id}','ProductController@geteditProduct');
        Route::post('editproduct/{id}','ProductController@posteditProduct');
        Route::get('deleteproduct/{id}','ProductController@deleteProduct');
        Route::get('searchproduct','ProductController@searchProduct');
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
        Route::get('orderlists/{id}', 'UserController@getOrderlists');
        Route::get('export-user', 'ExcelController@ExportExcel')->name('export-user');
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
      // Route Order by Duong Dong Hung
    Route::group(['prefix'=>'order'],function(){
        Route::get('orders','OrderController@listOrders');
        Route::get('search','OrderController@searchOrder');
        Route::get('detailorder/{id}','OrderController@detailOrder');
        Route::get('check/{id}','OrderController@checkOrder');
        Route::get('dilevery/{status}','OrderController@dileveryOrder');
        Route::get('calendar','OrderController@Calendar');
        Route::get('chart','OrderController@Chart');
        Route::get('calendar_detail/{date}','OrderController@Calendar_detal');
        Route::get('export-orderdetail', 'PDFController@getPDF')->name('export-orderdetail');
    });
});
//Cart
Route::group(['prefix'=>'dat-hang', 'middleware'=>'order'],function(){
    Route::GET('add-cart/{id}/{name}','CartController@addCart');
    Route::GET('cart','CartController@cart');
    Route::GET('deletecart/{rowId}', 'CartController@delete');
    Route::GET('viewcheckout', 'CartController@getcheckout')->name('cart');
    Route::GET('checkout', 'CartController@checkout');
    Route::GET('add-cartproduct/{id}/{name}','CartController@addCartProduct');
    Route::GET('add-cartsearch/{id}/{name}','CartController@addCartSearch');
    Route::GET('add-cartviewdetail/{id}/{name}','CartController@addCartviewdetail1');
    Route::GET('update_qty_cart/{id}/{qty}','CartController@update_qty_cart');
    });
Route::group(['prefix'=>'account'], function(){
    Route::get('orderlists', 'AccountController@getBills');
    Route::get('orderdetail/{id}', 'AccountController@getBillDetail');
    Route::get('orderlists/{id}/delete', 'AccountController@cancelBills');
    Route::get('information', 'AccountController@getInfo');
    Route::post('information', 'AccountController@postInfo');
    Route::get('change-password', 'AccountController@getPass');
    Route::post('change-password', 'AccountController@postPass');
    });
    Route::GET('sendmail','CartController@sendmail');
Route::GET('pusher','PageController@pusher');
Route::GET('test_pusher','CartController@testpusher');
