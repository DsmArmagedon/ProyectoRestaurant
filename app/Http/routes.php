<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function() {
    return view('auth.login');
});

Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', [
        'uses' => 'AuthController@getLogin',
        'as' => 'login'
    ]);

    Route::post('login', [
        'uses' => 'AuthController@postLogin',
        'as' => 'login'
    ]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout'
    ]);
    Route::get('home', [
    'uses' => 'Auth\HomeController@index',
    'as' => 'home']);
    
     Route::group(['middleware' => ['entrust', 'role:admin']], function () {
    Route::resource('users', 'UserController');
    Route::get('users/{users}/editPassword/', ['as' => 'users.editPassword', 'uses' => 'UserController@editPassword']);
    Route::put('users/{users}/updatePassword/', ['as' => 'users.updatePassword', 'uses' => 'UserController@updatePassword']);
    Route::get('users/{users}/status/', ['as' => 'users.status', 'uses' => 'UserController@status']);
    
    Route::resource('roles','RoleController');
    
    Route::resource('products', 'ProductController');
    Route::get('products/{products}/status/', ['as' => 'products.status', 'uses' => 'ProductController@status']);
    Route::get('products/{products}/get-product/', ['as' => 'products.get-product', 'uses' => 'ProductController@getProduct']);
    
    Route::resource('plates', 'PlateController');
    Route::get('plates/{plates}/destroy/', ['as' => 'plates.destroy', 'plates' => 'PlateController@destroy']);
    Route::get('plates/{plates}/status/', ['as' => 'plates.status', 'uses' => 'PlateController@status']);
    Route::get('plates/{plates}/get-plate/', ['as' => 'plates.get-plate', 'uses' => 'PlateController@getPlate']);
    
    Route::resource('purchases','PurchaseController');
    Route::get('purchases/{purchases}/status/', ['as' => 'purchases.status', 'uses' => 'PurchaseController@status']);
    Route::get('purchases/{purchases}/destroy/',['as' => 'purchases.destroy','uses'=>'PurchaseController@destroy']);
    Route::get('purchases/{purchases}/get-purchase/', ['as' => 'purchases.get-purchase', 'uses' => 'PurchaseController@getPurchase']);
    
    Route::resource('kitchens','KitchenController');
    Route::get('kitchens/{kitchens}/destroy/',['as' => 'kitchens.destroy','uses'=>'KitchenController@destroy']);
    
    Route::resource('sales','SaleController');
    Route::get('sales/{sales}/destroy/',['as' => 'sales.destroy','uses'=>'SaleController@destroy']);
     });
});
