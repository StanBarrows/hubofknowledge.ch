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

//User
Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::post('/questions/create', 'QuestionsController@create')->name('questions.create');
Route::get('/questions/show/{question}', 'QuestionsController@show')->name('questions.show');

Route::post('/answers/create', 'AnswersController@create')->name('answers.create');

//Expert
Route::get('/associations/index', 'AssociationsController@index')->name('associations.index');
Route::post('/associations/accept', 'AssociationsController@accept')->name('associations.accept');
Route::post('/associations/decline', 'AssociationsController@decline')->name('associations.decline');
Route::get('/associations/show/{association}', 'AssociationsController@show')->name('associations.show');

//Administrator

Route::get('/users/index', 'UsersController@index')->name('users.index');
Route::get('/documentation', 'DocumentationController@index')->name('documentation.index');

