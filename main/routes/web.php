<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// AUTHENTICATION ROUTE
Auth::routes();

/*****
PUBLIC ROUTES
******/

// HOME PAGE
Route::get('/', 'MainController@index')
    ->name('index');

// RESTAURANT MENU PAGE
Route::get('/restaurant/{id}' , 'MainController@showMenu')
    ->name('show-menu');

/*****
USER ROUTES
******/

// DASHBOARD (user area)
Route::get('/home', 'HomeController@index')
    ->name('home');

// FORM CREATE NEW ITEM
Route::get('/item', 'HomeController@createItem')
    ->name('item-create');

// STORE NEW ITEM
Route::post('/item/store', 'HomeController@storeItem')
    ->name('item-store');

// FORM EDIT ITEM
Route::get('/item-edit/{id}', 'HomeController@editItem')
    ->name('item-edit');
// UPDATE ITEM
Route::post('/item/update/{id}', 'HomeController@updateItem')
    ->name('item-update');

// SOFT DELETE ITEM (toggle 0 and 1)
Route::get('/item-delete/{id}', 'HomeController@deleteItem')
    ->name('item-delete');

// USER PROFILE PAGE
Route::get('/user-show', 'HomeController@userShow')
    ->name('user-show');

// FORM EDIT USER INFO
Route::get('/user-show/edit/{id}', 'HomeController@userEdit')
    ->name('user-edit');

// UPDATE (& upload user image) USER INFO
Route::post('/user-show/update/{id}', 'HomeController@updateUser')
    ->name('user-update');

// CLEAR USER IMG
Route::get('/clear-user-img', 'HomeController@clearUserImg')
    ->name('clear-user-img');

// CHECK OUT PAGE
Route::get('/pagamento', 'HomeController@payment')
    ->name('pagamento');

/*****
API ROUTES
******/
// CALL GET ALL TYPOLOGIES
Route::get('/gettypo' , 'ApiController@getAllTypologies')
->name('get-all-typology');

// CALL GET FILTERED RESTAURANT
Route::get('/getRestaurants/{firstType}/{secondType?}/{thirdType?}' , 'ApiController@getTypologyRestaurants')
->name('get-typology-restaurants');

// CALL GET FILTERED RESTAURANT COUNT
Route::get('/getCountRestaurant/{firstType}/{secondType?}/{thirdType?}' , 'ApiController@getCountRestaurants')
->name('get-typology-restaurants');

// CALL GET ITEM
Route::get('/getItem/{id}' , 'ApiController@getItem')
    ->name('cart');

// CREATE ORDER
Route::post('/store-order' , 'PaymentController@payment')
    ->name('store-order');

Route::post('/checkout', 'PaymentController@checkout')
    -> name('checkout');

// SEND EMAIL ORDER SUCCESS
Route::get('/order-success' , 'MainController@successOrder')
    ->name('success');

// api: GET DATAS BY TIME (CHART)
Route::get('/get-time/{id}' , 'ApiController@getTime')
    ->name('get-time');
