<?php

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

Route::group(['namespace' => 'Api'], function(){
    Route::GET('/carouselList', 'CarouselController@carouselList');
    Route::GET('/carouselDetail/{id}', 'CarouselController@carouselDetail');

    Route::POST('/register', 'UserController@register');

    Route::any('/auth', 'AuthController@auth');
});
