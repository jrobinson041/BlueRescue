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

Route::get('/', function() {
    return view('home');
});

Route::get('/admin', 'BlueprintController@showForm');

Route::post('/admin', 'BlueprintController@addBlueprint');

Route::delete('/admin/{id}', 'BlueprintController@deleteBlueprint');

Route::post('/admin/{id}', 'BlueprintController@viewBlueprint');

Route::get('/dispatch', 'DispatchFeedController@showAll');

Route::post('/dispatch', 'DispatchFeedController@addTask');

Route::post('/dispatch/notes', 'NoteController@addNote');

Route::delete('/dispatch/notes/{id}/{noteid}', 'NoteController@deleteNote');

Route::delete('/dispatch/{id}', 'DispatchFeedController@deleteTask');

Route::post('/dispatch/{id}', 'DispatchFeedController@viewTask');

Route::get('/dispatch/{id}', 'DispatchFeedController@viewTask');

Route::get('/task', 'TaskController@showAll');

Route::post('/task', 'TaskController@addTask');

Route::delete('/task/{id}', 'TaskController@deleteTask');
