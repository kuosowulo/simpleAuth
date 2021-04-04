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

// 取得登入頁面
Route::get('/login', 'AuthController@viewLoginPage');

// JWT Authentication
Route::post('/login', 'AuthController@login');

// 第三方登入
Route::get('/thirdPartyAuth', 'AuthController@thirdPartyAuth');

// google登入重新導向
Route::get('/google/auth', 'AuthController@redirectToGoogleAuth');

// facebook登入重新導向
Route::get('/facebook/auth', 'AuthController@redirectToFacebookAuth');