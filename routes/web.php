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
    return view('home');
});

Route::get('/', 'GeoLocationController@index');
Route::get('/get-district/{id}', 'GeoLocationController@get_district')->name('get_district');
Route::get('/get-upazila/{id}', 'GeoLocationController@get_upazila')->name('get_upazila');

Route::get('/find-user-by-district-or-upazila/{id}', 'GeoLocationController@find_user_by_district_or_upazila');

/////////////////////////////////////////////////////////////////////
Auth::routes();
Route::get('/profile', 'HomeController@index')->name('user.profile');
Route::get('/profile/edit/{id}', 'HomeController@editProfile')->name('user.editProfile');
Route::post('/profile/update/{id}', 'HomeController@updateProfile')->name('user.updateProfile');
