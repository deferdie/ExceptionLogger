<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');

// Projects
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/create', 'ProjectController@create')->name('createProject');
Route::get('/projects/{project}', 'ProjectController@show')->name('showProject');
Route::post('/projects', 'ProjectController@store')->name('storeProject');
Route::patch('/projects/{project}', 'ProjectController@update')->name('updateProject');
Route::delete('/projects/{project}', 'ProjectController@delete')->name('deleteProject');

// Status Codes
Route::post('/project/{project}/statusCode', 'StatusCodeController@store')->name('storeStatusCode');
Route::patch('/project/{project}/statusCode/{statusCode}', 'StatusCodeController@update')->name('updateStatusCode');


// Applications
Route::get('/application', 'ApplicationController@index')->name('applications');

// ExceptionLog
Route::get('/exceptions', 'ProjectExceptionController@index')->name('exceptionLog');
Route::get('/exceptions/{exception}', 'ProjectExceptionController@show')->name('showException');

//Realtime
Route::get('/realtime/exceptions', 'RealtimeController@index')->name('realtime');