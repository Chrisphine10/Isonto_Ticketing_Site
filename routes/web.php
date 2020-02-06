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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/church-list', 'ChurchController@index')->name('church-list');
Route::post('/add-church', 'ChurchController@create')->name('add-church');
Route::get('/delete-church', 'ChurchController@index')->name('delete-church');
