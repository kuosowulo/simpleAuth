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

Route::get('/login', 'AuthController@viewLoginPage');

Route::post('/login', 'AuthController@login');

Route::get('/thirdPartyAuth', 'AuthController@thirdPartyAuth');

Route::get('/google/auth', 'AuthController@redirectToGoogleAuth');

Route::get('/facebook/auth', 'AuthController@redirectToFacebookAuth');