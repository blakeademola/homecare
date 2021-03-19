<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth.admin', 'web'], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('admin/dashboard', ['as' => 'adminDashboard', 'uses' => 'DashboardController@adminDashboard']);
    Route::post('purchase/item', ['as' => 'purchase', 'uses' => 'ProductController@purchase']);
});

Route::group(['prefix' => 'auth', 'middleware' => 'guest', 'namespace' => 'Auth'], function () {
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@index']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@registerUser']);
});

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'AuthController@postLogin']);

});

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

Route::any('/', function () {
    return redirect()->to(url('/auth/login'));
});
