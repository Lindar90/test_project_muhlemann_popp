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

Route::redirect('/', '/import', 301);

Route::get('/users-import', 'ImportUsersController@index')->name('users.import.index');
Route::post('/users-import', 'ImportUsersController@store')->name('users.import.store');

Route::get('/users-search', 'UsersSearchController@index')->name('users.search.index');
Route::get('/users-find', 'UsersSearchController@find')->name('users.search.find');
