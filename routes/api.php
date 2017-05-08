<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('users','UserController');
Route::resource('students','StudentController');
Route::resource('values','ValueController');
Route::resource('classes','KelasController');
Route::resource('subjects','SubjectController');
Route::resource('teachers','TeacherController');
Route::get('getList-teachers','TeacherController@getList');
Route::get('getList-students','StudentController@getList');
// Route::get('getList-users','UserController@getList');
