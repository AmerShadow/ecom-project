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

Route::resource('categories', 'CategoryController');
Route::resource('slides', 'SlideController');
Route::resource('items', 'ItemController');
Route::resource('itemimages', 'ItemImageController');
Route::resource('pincodes', 'PinCodeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/userlist','AdminController@userList')->name('admin.userlist');
Route::put('/admin/changestatus/{id}','AdminController@changeUserStatus')->name('admin.changestatus');
Route::delete('/admin/users/{id}', 'AdminController@userDestroy')->name('admin.userdestroy');
