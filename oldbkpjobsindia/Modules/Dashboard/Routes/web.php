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


Route::middleware('can:candidate')->group(function () {
	Route::prefix('dashboard')->group(function() {
    	Route::get('/', 'DashboardController@index')->name('dashboard');
    	Route::post('/saveProfileData', 'DashboardController@saveProfileData')->name('saveProfileData');
	});
});	


    	
Route::get('/getCities', 'DashboardController@getCitiesAjax')->name('getCitiesAjax');
Route::get('/getStates', 'DashboardController@getStatesAjax')->name('getStatesAjax');
Route::get('/getDegreeTypeAjax', 'DashboardController@getDegreeTypeAjax')->name('getDegreeTypeAjax');