<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'MainController@index')
    ->name('index');
Route::get('/gettypo' , 'ApiController@getAllTypologies')
    ->name('get-all-typology');

Route::get('/getRestaurantByType/{id}' , 'ApiController@getTypologyRestaurants')
    ->name('get-typology-restaurants');
Route::get('/restaurant/{id}' , 'MainController@showMenu')
    ->name('show-menu');

    Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/item', 'HomeController@createItem')->name('item-create');

Route::post('/item/store', 'HomeController@storeItem')->name('item-store');
