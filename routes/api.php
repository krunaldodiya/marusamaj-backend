<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('/request-otp', 'OtpController@requestOtp');
    Route::post('/verify-otp', 'OtpController@verifyOtp');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
    Route::post('/me', 'UserController@me');
    Route::post('/caste/update', 'UserController@updateUserCaste');
    Route::post('/profile/update', 'UserController@updateUserProfile');
    Route::post('/family/update', 'UserController@updateUserFamily');
});

Route::group(['prefix' => 'wallet', 'middleware' => 'auth:api'], function () {
    Route::post('/info', 'UserController@wallet');
});

Route::group(['prefix' => 'castes', 'middleware' => 'auth:api'], function () {
    Route::post('/', 'CasteController@castes');
});