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


Auth::routes(['verify' => true]);


Route::middleware(['auth','verified','admin'])->group( function () {


        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('categories', 'CategoryController');
        Route::resource('slides', 'SlideController');
        Route::resource('subscriptions', 'SubscriptionPlanController');


        Route::get('/admin/sellerlist','AdminController@sellerList')->name('admin.sellerlist');
        Route::get('/admin/sellerdetails/{id}','AdminController@sellerDetails')->name('admin.sellerdetails');
        Route::get('/admin/productlist','AdminController@productList')->name('admin.productlist');


        Route::get('/admin/adddeliverypeer','AdminController@addDeliveryPeer')->name('admin.adddeliverypeer');
        Route::get('/admin/deliverylist','AdminController@deliveryList')->name('admin.deliverylist');
        Route::get('/admin/deliverypeer/{id}','AdminController@deliveryDetails')->name('admin.deliverydetails');


        //routes related to transactions
        Route::get('admin/transactions/reports','TransactionsController@index')->name('admin.transactions.reports');
        Route::get('admin/transactions/seccessfull','TransactionsController@successfullTransactions')->name('admin.transactions.successfull');
        Route::get('admin/transactions/failed','TransactionsController@failedTransactions')->name('admin.transactions.failed');


        //routes for customer and seller permissions
        Route::get('admin/permissions/customer','AdminController@customerPermissions')->name('admin.permissions.customer');
        Route::get('admin/permissions/seller','AdminController@sellerPermissions')->name('admin.permissions.seller');


        //routes related to subscription and revenue management



        Route::get('/admin/buyerlist','AdminController@buyerList')->name('admin.buyerlist');
        Route::get('/admin/buyerdetails/{id}','AdminController@buyerDetails')->name('admin.buyerdetails');
        Route::put('/admin/changestatus/{id}','AdminController@changeUserStatus')->name('admin.changestatus');
        Route::delete('/admin/users/{id}', 'AdminController@userDestroy')->name('admin.userdestroy');


});
Route::resource('items', 'ItemController');
Route::resource('itemimages', 'ItemImageController');





/***
 * Seller routes
 *
 */
Route::get('/seller','SellerController@seller')->name('seller.home')->middleware(['auth','verified','seller']);
Route::get('/seller/subscribe','SellerController@buySubscription')->name('seller.subscribe')->middleware(['auth','verified','seller']);
 Route::middleware(['auth','verified','subscription','seller'])->group(function () {

        //routes for pincode of the deliveries of the user
        Route::resource('pincodes', 'PinCodeController');

        //Route shows all products of seller
        Route::get('seller/products','sellerController@products')->name('seller.products');

        //add new product for seller
        Route::get('seller/products/create','sellerController@create')->name('seller.products.create');
        Route::post('seller/products/store','sellerController@store')->name('seller.products.store');

        //Order Details
        Route::get('seller/orders/recieved','sellerController@recievedOrders')->name('seller.orders.recieved');
        Route::get('seller/orders/dispatched','sellerController@dispatchedOrders')->name('seller.orders.dispatched');
        Route::get('seller/orders/history','sellerController@ordersHistory')->name('seller.orders.history');
        Route::get('seller/orders/customerprofile/{id}','sellerController@customerprofile')->name('seller.orders.customerprofile');


        //routes for changing staus of order e.g
        Route::get('seller/orders/changetodispatch/{id}','sellerController@changeToDispatch')->name('seller.orders.changetodispatch');
        Route::get('seller/orders/track/{id}','sellerController@trackOrder')->name('seller.orders.track');


 });

//routes for seller profile
Route::get('seller/profile','sellerController@profile')->name('seller.profile')->middleware(['auth','verified','seller']);
