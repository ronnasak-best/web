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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product','IndexController@index')->name('product');
Route::get('/howitwork','IndexController@howitwork');
Route::get('/test','IndexController@test');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/product-detail/{id}','IndexController@detialpro');
Route::get('/get-product-attr','IndexController@getAttrs');
Route::get('/cat/{id?}/{ss?}','IndexController@listByCat')->name('cats');

//cart
Route::resource('/cart','CartController');
Route::get('/cart/delete/{id}', 'CartController@destroy')->name('cart.destroy');

//address
Route::get('/province','DistrictController@provinces');
Route::get('/province/{province_code}/amphoe','DistrictController@amphoes');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district','DistrictController@districts');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district/{district_code}','DistrictController@detail');


////// User Authentications ///////////
Route::group(['middleware'=>['auth']],function (){

    Route::resource('/myaccount', 'AddressController');
    Route::resource('/check-out','CheckoutController');
    Route::post('/payment','CheckoutController@payment');
    Route::resource('/orders', 'OrderController');
    Route::post('/order_return','OrderController@upload_return')->name('order.return');

});

/** backend */
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin']],function (){
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
    /// Category Area
    Route::resource('/category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@destroy');
    /// Product Area
    Route::resource('/products', 'ProductsController');
    Route::get('product/delete/{id}', 'ProductsController@destroy');
    /// Product Images
    Route::resource('/Image-gallery', 'GalleryController');
    Route::get('Image-gallery/delete-Imagegallery/{id}', 'GalleryController@destroy');
    /// product_atrr
    Route::resource('/product_atrr', 'ProductAtrrController');
    Route::get('product_atrr/delete/{id}', 'ProductAtrrController@destroy');
    //Order
    Route::resource('/orderss','BackEndOrderController');
    Route::get('orderss/cancel/{id}', 'BackEndOrderController@destroy');
    //ReturnPproducts
    Route::resource('/orders_re','ReturnProductsController');
    //User
    Route::resource('/user','UserController');

});
