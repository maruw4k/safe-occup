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

Route::get('blade', function () {
    return view('child');
});

//Controller routes
Route::resource('admin','AdminController');
Route::resource('car','CarController');
Route::resource('stats','StatsController');
Route::resource('intervention','InterventionController');
Route::resource('interventionType','InterventionTypeController');
Route::resource('map','MapController');
Route::resource('officer','OfficerController');
Route::resource('rank','RankController');
Route::resource('station','StationController');
Route::resource('unit','UnitController');
Route::resource('user','UserController');
Route::resource('zone','ZoneController');
//Auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
