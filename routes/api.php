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
    Route::post('/me', 'UserController@me');
    Route::post('/all', 'UserController@getAllUsers');
    Route::post('/caste/update', 'UserController@updateUserCaste');
    Route::post('/profile/update', 'UserController@updateUserProfile');
});

Route::group(['prefix' => 'avatar', 'middleware' => 'auth:api'], function () {
    Route::post('/change', 'UserController@changeAvatar');
});

Route::group(['prefix' => 'family', 'middleware' => 'auth:api'], function () {
    Route::post('/add', 'RelationController@addFamilyMember');
});

Route::group(['prefix' => 'wallet', 'middleware' => 'auth:api'], function () {
    Route::post('/info', 'UserController@wallet');
});

Route::group(['prefix' => 'castes'], function () {
    Route::post('/', 'CasteController@castes');
});