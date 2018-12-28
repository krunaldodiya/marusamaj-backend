<?php

use RobinCSamuel\LaravelMsg91\Facades\LaravelMsg91;

Auth::routes();

Route::get('/test', function () {
    return LaravelMsg91::sendOtp("9426726815", "1234", "Your otp for phone verification is 1234");
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/terms', 'HomeController@terms')->name('terms');

Route::get('/passport', 'HomeController@passport')->name('passport');

Route::group(['prefix' => 'payments'], function () {
    Route::get('/create-order', 'PaymentController@createOrder')->name('paytm.create-order');
    Route::post('/process-order', 'PaymentController@processOrder')->name('paytm.process-order');
    Route::post('/order-response', 'PaymentController@orderResponse')->name('paytm.order-response');
    Route::get('/order-status', 'PaymentController@orderStatus')->name('payments.order-status');
});

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    Route::get('/login', 'AuthController@showLogin')->name('login.get');
    Route::post('/login', 'AuthController@processLogin')->name('login.post');
});