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
Route::get('lang/{locale}', 'ThemesController@localize')->name('localize');
Route::get('/', 'ThemesController@getLandingPage');

Route::get('templates/{id?}', 'ThemesController@getAllTemplate')->name('templates');
Route::get('jobs/{q?}', 'ThemesController@getJobsList')->name('jobslist');
Route::get('job/{slug}', 'ThemesController@getJobDetail')->name('job');

Route::get('companies/{q?}', 'ThemesController@getCompanies')->name('companies');

Route::get('company/{slug?}', 'ThemesController@getCompanyDetail')->name('company');

Route::get('contact', 'ThemesController@contact')->name('contact');
Route::post('contact/save', 'ThemesController@saveContact')->name('savecontact');

Route::get('/clear-cache', function(){
    \Artisan::call('config:cache');
    \Artisan::call('cache:clear');
    \Artisan::call('optimize:clear');
    \Artisan::call('view:clear');
    echo('Cache Clear');
});
