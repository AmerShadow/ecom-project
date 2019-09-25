<?php

use App\Http\Resources\SlideResource;
use App\Model\Slide;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('items/show', 'Api\ItemController@index');

//Route::apiResource('items', 'Api\ItemController');
//Route::apiResource('itemimages','Api\ItemImageController');

Route::get('items/images/{id}','Api\ItemImageController@showItemImages');
Route::post('items/images/update/{id}','Api\ItemImageController@update');

/**
 * Api Routes for Items
 */

Route::get('items','Api\ItemController@index');
Route::get('items/{id}','Api\ItemController@show')->name('api.item');
Route::post('items','Api\ItemController@store');
Route::post('items/update/{id}','Api\ItemController@update');

/**
 * Api routes for categories
 */
Route::get('categories','Api\CategoryController@index');
Route::get('categories/{id}','Api\CategoryController@show');
Route::post('categories','Api\CategoryController@store');
Route::post('categories/update/{id}','Api\CategoryController@update');


/**
 * Api routes for item images
 */
Route::get('itemimages','Api\ItemImageController@index');
Route::get('itemimages/{id}','Api\ItemImageController@show');
Route::post('itemimages','Api\ItemImageController@store');
Route::post('itemimages/update/{id}','Api\ItemImageController@update');

/**
 * Api routes for pin codes
 */
Route::get('pincodes','Api\PinCodeController@index');
Route::get('pincodes/{id}','Api\PinCodeController@show');
Route::post('pincodes','Api\PinCodeController@store');
Route::post('pincodes/update/{id}','Api\PinCodeController@update');


/**
 * Api for sliding images
 */
Route::get('slides', function () {
    return SlideResource::collection(Slide::OrderBy('index')->get());

});



/**
 * Api for customer cart
 */
Route::get('cart/{user_id}','CartController@index');
Route::post('cart/{customer_id}/{item_id}','CartController@store');
Route::delete('cart/{id}','CartController@destroy');
Route::get('cart/cartplus/{id}','CartController@cartPlus');
Route::get('cart/cartminus/{id}','CartController@cartMinus');


/**
 * Api for order and order confirmation
 */
Route::get('confirmorder/{customer_id}','OrderController@orderPreview');
//This api is used to remove element from order but it will be in customers cart
Route::get('confirmorder/removeitem/{itemid}/{customerid}','OrderController@removeItem');

Route::post('/user','Api\UserController@store');
