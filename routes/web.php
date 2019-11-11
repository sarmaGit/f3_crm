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

use App\Events\TaskSavedEvent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/queue', ['as' => 'queue', 'uses' => 'QueueController@index']);

Route::get('/queue/add', ['as' => 'add', 'uses' => 'QueueController@add']);

Route::resource('tasks', 'TaskController');

123
