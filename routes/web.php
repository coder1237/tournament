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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// teams
Route::group(['prefix'=>'teams'],function(){
    Route::get('/', 'TeamController@index')->name('teams.index');
    Route::get('create', 'TeamController@create')->name('teams.create');
    Route::get('edit/{id}', 'TeamController@edit')->name('teams.edit');
    Route::post('save', 'TeamController@store')->name('teams.store');
    Route::post('update/{id}', 'TeamController@update')->name('teams.update');
    Route::get('delete/{id}', 'TeamController@destroy')->name('teams.delete');
});

// configurations
Route::group(['prefix'=>'settings'],function(){
    Route::get('/', 'SettingController@show')->name('settings.index');
    Route::post('update', 'SettingController@update')->name('settings.update');
});

// groups
Route::group(['prefix'=>'groups'],function(){
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('create', 'GroupController@create')->name('groups.create');
    Route::get('edit/{id}', 'GroupController@edit')->name('groups.edit');
    Route::post('save', 'GroupController@store')->name('groups.store');
    Route::post('update/{id}', 'GroupController@update')->name('groups.update');
    Route::get('delete/{id}', 'GroupController@destroy')->name('groups.delete');
});

