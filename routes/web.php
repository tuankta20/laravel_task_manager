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

route::prefix('tasks')->group(function (){
    route::get('/','TaskController@index')->name('task');
    route::get('create','TaskController@create');
    route::post('store','TaskController@store')->name('task.store');
    route::get('edit/{id}','TaskController@edit')->name('task.edit');
    route::put('update/{id}','TaskController@update')->name('task.update');
    route::delete('destroy/{id}','TaskController@destroy')->name('task.destroy');
    route::get('search/','TaskController@search')->name('task.search');
});
