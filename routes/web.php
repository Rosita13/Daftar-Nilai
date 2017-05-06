<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard');
})->name('page.dashboard');

Route::get('/login', function () {
    return view('pages.login');
})->name('page.login');

Route::get('/users','Pages\UserController@index')->name('page.list-user');
Route::get('/users/create','Pages\UserController@create')->name('page.create-user');
Route::get('/users/{id}/edit','Pages\UserController@edit')->name('page.edit-user');

Route::get('/teachers','Pages\TeacherController@index')->name('page.list-guru');
Route::get('/teachers/create','Pages\TeacherController@create')->name('page.create-guru');
Route::get('/teachers/{id}/edit','Pages\TeacherController@edit')->name('page.edit-guru');

Route::get('/students','Pages\StudentController@index')->name('page.list-siswa');
Route::get('/students/create','Pages\StudentController@create')->name('page.create-siswa');
Route::get('/students/{id}/edit','Pages\StudentController@edit')->name('page.edit-siswa');

Route::get('/values','Pages\ValueController@index')->name('page.list-nilai');
Route::get('/values/create','Pages\ValueController@create')->name('page.create-nilai');
Route::get('/values/{id}/edit','Pages\ValueController@edit')->name('page.edit-nilai');

Route::get('/classes','Pages\KelasController@index')->name('page.list-class');
Route::get('/classes/create','Pages\KelasController@create')->name('page.create-class');
Route::get('/classes/{id}/edit','Pages\KelasController@edit')->name('page.edit-class');

Route::get('/subjects','Pages\SubjectController@index')->name('page.list-mapel');
Route::get('/subjects/create','Pages\SubjectController@create')->name('page.create-mapel');
Route::get('/subjects/{id}/edit','Pages\SubjectController@edit')->name('page.edit-mapel');

