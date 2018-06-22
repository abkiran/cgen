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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    // System Crud
    Route::resource('admin/system/user', 'UserController');
    Route::get('admin/setting', 'SettingController@settingsEdit');
    Route::post('admin/setting', 'SettingController@settingsUpdate');
    // Route::resource('admin/system/setting', 'SettingController');
});
