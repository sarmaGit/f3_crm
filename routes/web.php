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

//Route::match(['get', 'post'],
//    '/tasks', ['as' => 'tasks.index', 'uses' => 'TaskController@index']);

//Route::post('/tasks', ['as' => 'tasks.index', 'uses' => 'TaskController@index']);



Route::post('/tasks/date', ['as' => 'select_date', 'uses' => 'TaskController@select_date']);

Route::resource('tasks', 'TaskController');