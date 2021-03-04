<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'MainController@index')
    ->name('index');
Route::get('/gettypo' , 'ApiController@getAllTypologies')
    ->name('get-all-typology');

Route::get('/getRestaurant/{firstType}/{secondType?}/{thirdType?}' , 'ApiController@getTypologyRestaurants')
    ->name('get-typology-restaurants');
Route::get('/restaurant/{id}' , 'MainController@showMenu')
    ->name('show-menu');

    Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/item', 'HomeController@createItem')->name('item-create');

Route::post('/item/store', 'HomeController@storeItem')->name('item-store');
// EDIT ITEM PAGE
Route::get('/item-edit/{id}', 'HomeController@editItem')->name('item-edit');
// EDIT ITEMS
Route::post('/item/update/{id}', 'HomeController@updateItem')->name('item-update');
// DELETE ITEM (hide)
Route::get('/item-delete/{id}', 'HomeController@deleteItem')->name('item-delete');
// USER SHOW PAGE
Route::get('/user-show', 'HomeController@userShow')->name('user-show');
// EDIT USER
Route::get('/user-show/edit/{id}', 'HomeController@userEdit')->name('user-edit');
// UPDATE USER
Route::post('/user-show/update/{id}', 'HomeController@updateUser')->name('user-update');
// DELETE USER IMG
Route::get('/clear-user-img', 'HomeController@clearUserImg')->name('clear-user-img');
