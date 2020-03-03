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

Route::get('/', 'StartController@index')->name('start.index');

Route::get('/questions/index', 'QuestionsController@index')->name('questions.index');
Route::post('/questions/ask', 'QuestionsController@ask')->name('questions.ask');
Route::get('/questions/show/{question}', 'QuestionsController@show')->name('questions.show');

//User
Route::get('/profile', 'ProfileController@index')->name('profile.index');

//Administrator

Route::get('/users/index', 'UsersController@index')->name('users.index');
Route::get('/documentation', 'DocumentationController@index')->name('documentation.index');
