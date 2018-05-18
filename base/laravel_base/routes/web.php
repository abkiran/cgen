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
    Route::resource('admin/system/language', 'LanguageController');
    Route::resource('admin/system/group', 'GroupController');
    Route::resource('admin/system/hotel', 'HotelController');
    Route::resource('admin/system/interest', 'InterestController');
    Route::resource('admin/system/neighborhood', 'NeighborhoodController');
    Route::resource('admin/system/field_helper', 'FieldHelperController');
    Route::resource('admin/system/email_template', 'EmailTemplateController');
    Route::resource('admin/system/show_outgoing_email', 'EmailCronController');
    Route::get('admin/system/setting', 'SystemSettingController@settingsEdit');
    Route::post('admin/system/setting', 'SystemSettingController@settingsUpdate');
    // Route::resource('admin/system/setting', 'SystemSettingController');
    Route::resource('admin/volunteer', 'VolunteerController');
    Route::resource('admin/visit', 'VisitController');


    Route::get('admin/system/field_helper/get_fields/{model}', 'FieldHelperController@getFields');
});
