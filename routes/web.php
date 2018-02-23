<?php

use \App\Events\MessageWasSent;

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

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/{project}', 'ProjectController@show')->name('showProject');
Route::post('/projects', 'ProjectController@create')->name('createProject');
Route::patch('/projects/{project}', 'ProjectController@update')->name('updateProject');
Route::delete('/projects/{project}', 'ProjectController@delete')->name('deleteProject');

// Applications
Route::get('/application', 'ApplicationController@index')->name('applications');

// ExceptionLog
Route::get('/exceptions', 'ProjectExceptionController@index')->name('exceptionLog');

// Route::get('/message', function(){
// 	MessageWasSent::dispatch();
// });
