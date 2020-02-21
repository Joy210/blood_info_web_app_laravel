<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/', 'GeoLocationController@index');
Route::get('/get-district/{id}', 'GeoLocationController@get_district')->name('get_district');
Route::get('/get-upazila/{id}', 'GeoLocationController@get_upazila')->name('get_upazila');

Route::get('/fetch-users', 'GeoLocationController@fetch_users');
Route::get('/find-user-by-division/{id}', 'GeoLocationController@find_user_by_division');
Route::get('/find-user-by-district/{id}', 'GeoLocationController@find_user_by_district');
Route::get('/find-user-by-upazila/{id}', 'GeoLocationController@find_user_by_upazila');

Route::get('/booking-user/{id}', 'NotificationController@booking_user');
Route::post('send-msg', 'NotificationController@send_msg');
Route::get('show-msg/{id}', 'NotificationController@show');
Route::post('confirm-booking/{id}', 'NotificationController@confirm_booking');

////////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();
Route::get('/profile', 'HomeController@index')->name('user.profile');
Route::get('/profile/edit/{id}', 'HomeController@editProfile')->name('user.editProfile');
Route::post('/profile/update/{id}', 'HomeController@updateProfile')->name('user.updateProfile');
