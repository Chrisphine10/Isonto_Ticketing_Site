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
Route::resource('churches', 'ChurchController');
Route::resource('events', 'EventController');
Route::resource('images', 'ImageController');
Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('ticketTokens', 'TicketTokenController');
//Route::apiResource('contacts', 'ContactController');
//Route::get('/church-list', 'ChurchController@index')->name('church-list');
//Route::get('/add-church', 'ChurchController@create')->name('add-church');
//Route::post('/new-church', 'ChurchController@store');
//Route::get('/view-church/{id}', 'ChurchController@show');
//Route::get('/delete-church', 'ChurchController@index')->name('delete-church');
