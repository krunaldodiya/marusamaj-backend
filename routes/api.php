<?php

Route::group(['prefix' => 'auth', 'middleware' => 'guest:api'], function () {
    Route::post('/request-otp', 'OtpController@requestOtp');
    Route::post('/verify-otp', 'OtpController@verifyOtp');
});

Route::group(['prefix' => 'guest', 'middleware' => 'guest:api'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
});


Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
    Route::post('/id', 'UserController@getUserById');
    Route::post('/me', 'UserController@me');
    Route::post('/all', 'UserController@getAllUsers');
    Route::post('/caste/update', 'CasteController@updateUserCaste');
    Route::post('/profile/update', 'UserController@updateUserProfile');
});

Route::group(['prefix' => 'users'], function () {
    Route::post('/mobile', 'UserController@getUsersByMobile');
});

Route::group(['prefix' => 'avatar', 'middleware' => 'auth:api'], function () {
    Route::post('/change', 'UserController@changeAvatar');
});

Route::group(['prefix' => 'relation', 'middleware' => 'auth:api'], function () {
    Route::post('/request', 'RelativeController@requestRelation');
});

Route::group(['prefix' => 'wallet', 'middleware' => 'auth:api'], function () {
    Route::post('/info', 'UserController@wallet');
});

Route::group(['prefix' => 'castes'], function () {
    Route::post('/', 'CasteController@castes');
});