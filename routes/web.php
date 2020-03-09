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
Route::get('/session', 'UserController@show');

Route::resource('churches', 'ChurchController')->middleware('auth')->except(['index', 'show']);
Route::resource('churches', 'ChurchController')->only(['index', 'show']);

Route::resource('images', 'ImageController')->middleware('auth')->except(['index', 'show']);
Route::resource('images', 'ImageController')->only(['index', 'show']);

Route::resource('comments', 'CommentController')->middleware('auth')->except(['index', 'show']);
Route::resource('comments', 'CommentController')->only(['index', 'show']);

Route::resource('posts', 'PostController')->middleware('auth')->except(['index', 'show']);
Route::resource('posts', 'PostController')->only(['index', 'show']);

Route::resource('events', 'EventController')->middleware('auth')->except(['index', 'show']);
Route::resource('events', 'EventController')->only(['index', 'show']);

Route::resource('ticketTokens', 'TicketTokenController')->middleware('auth')->except(['index', 'show']);
Route::resource('ticketTokens', 'TicketTokenController')->only(['index', 'show']);


Route::resource('adminchurch', 'AdminChurchController')->middleware('auth');
Route::resource('adminevent', 'AdminEventController')->middleware('auth');
Route::resource('adminpost', 'AdminPostController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');
//Route::get('users', 'UserController@index')->name('users');
// Route::get('churches', 'ChurchController@index')->name('churches');
// Route::get('churches/list', 'ChurchController@listindex')->name("church");
// Route::get('churches/{church}', 'ChurchController@show');
// Route::get('churches/create', 'ChurchController@create')->middleware('auth');
// Route::post('churches', 'ChurchController@store')->middleware('auth');
// Route::get('churches/{church}/edit', 'ChurchController@edit')->middleware('auth');
// Route::patch('churches/{church}', 'ChurchController@update')->middleware('auth');
// Route::delete('churches/{church}', 'ChurchController@destroy')->middleware('auth');


// Route::get('events', 'EventController@index')->name('events');
// Route::get('events/{events}', 'EventController@show');
// Route::get('events/create', 'EventController@create')->middleware('auth');
// Route::post('events', 'EventController@store')->middleware('auth');
// Route::get('events/{events}/edit', 'EventController@edit')->middleware('auth');
// Route::patch('events/{events}', 'EventController@update')->middleware('auth');
// Route::delete('events/{events}', 'EventController@destroy')->middleware('auth');


// Route::get('images', 'ImageController@index')->name('images');
// Route::get('images/{images}', 'ImageController@show');
// Route::get('images/create', 'ImageController@create')->middleware('auth');
// Route::post('images', 'ImageController@store')->middleware('auth');
// Route::get('images/{images}/edit', 'ImageController@edit')->middleware('auth');
// Route::patch('images/{images}', 'ImageController@update')->middleware('auth');
// Route::delete('images/{images}', 'ImageController@destroy')->middleware('auth');


// Route::get('posts', 'PostController@index')->name('posts');
// Route::get('posts/{posts}', 'PostController@show');
// Route::get('posts/create', 'PostController@create')->middleware('auth');
// Route::post('posts', 'PostController@store')->middleware('auth');
// Route::get('posts/{posts}/edit', 'PostController@edit')->middleware('auth');
// Route::patch('posts/{posts}', 'PostController@update')->middleware('auth');
// Route::delete('posts/{posts}', 'PostController@destroy')->middleware('auth');


// Route::get('comments', 'CommentController@index')->name('comments');
// Route::get('comments/{comments}', 'CommentController@show');
// Route::get('comments/create', 'CommentController@create')->middleware('auth');
// Route::post('comments', 'CommentController@store')->middleware('auth');
// Route::get('comments/{comments}/edit', 'CommentController@edit')->middleware('auth');
// Route::patch('comments/{comments}', 'CommentController@update')->middleware('auth');
// Route::delete('comments/{comments}', 'CommentController@destroy')->middleware('auth');

// Route::get('ticketTokens', 'TicketTokenController@index')->name('ticketTokens');
// Route::get('ticketTokens/{ticketTokens}', 'TicketTokenController@show');
// Route::get('ticketTokens/create', 'TicketTokenController@create')->middleware('auth');
// Route::post('ticketTokens', 'TicketTokenController@store')->middleware('auth');
// Route::get('ticketTokens/{ticketTokens}/edit', 'TicketTokenController@edit')->middleware('auth');
// Route::patch('ticketTokens/{ticketTokens}', 'TicketTokenController@update')->middleware('auth');
// Route::delete('ticketTokens/{ticketTokens}', 'TicketTokenController@destroy')->middleware('auth');