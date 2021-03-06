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

Route::resource('project','ProjectController');

Route::middleware('admin')->get('project/create','ProjectController@create')->name('project.create');
Route::middleware('admin')->post('project/create','ProjectController@store')->name('project.store');
Route::middleware('admin')->get('project/{project}/edit','ProjectController@edit')->name('project.edit');
Route::middleware('admin')->put('project/{project}','ProjectController@update')->name('project.update');
Route::middleware('admin')->delete('project/{project}','ProjectController@update')->name('project.destroy');

