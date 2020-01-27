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
Route::get('/master', 'HomeController@getIndex');

Route::get('index/task','TaskController@index')->name('index_task');
Route::get('create/task','TaskController@create')->name('create_task');
Route::post('store','TaskController@store')->name('store_task');
Route::get('{id}/edit/task','TaskController@edit')->name('edit_task');
Route::post('{id}/update/task','TaskController@update')->name('update_task');
Route::get('{id}/delete/task','TaskController@destroy')->name('delete_task');



Route::get('index/teacher','TeacherController@index')->name('index_teacher');
Route::get('create/teacher','TeacherController@create')->name('create_teacher');
Route::post('store/teacher','TeacherController@store')->name('store_teacher');
Route::get('{id}/edit/teacher','TeacherController@edit')->name('edit_teacher');
Route::post('{id}/update/teacher','TeacherController@update')->name('update_teacher');
Route::get('{id}/delete/teacher','TeacherController@destroy')->name('delete_teacher');



Route::get('contact','PageController@create')->name('mail_create');
Route::post('contact','PageController@index')->name('page_index');



