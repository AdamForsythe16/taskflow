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

Route::get('/', 'PagesController@home');

Route::resource('projects', 'ProjectsController');

Route::get('/projects/{project}/{task}', 'TasksController@show');
Route::post('/projects/{project}/{task}', 'TasksController@store');
Route::patch('/tasks/{task}', 'TasksController@update');
Route::delete('/projects/{project}/{task}', 'TasksController@destroy');

Route::post('/projects/{project}/{task}/{subtask}', 'SubtasksController@store');
Route::patch('/subtasks/{subtask}', 'SubtasksController@update');

Auth::routes();

Route::get('/profile', 'PagesController@profile');
Route::get('/logout', 'PagesController@logout');

Route::get('/home', 'HomeController@index')->name('home');
