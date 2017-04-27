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
});
Route::get('/list-siswa', function () {
    return view('pages.list-siswa');
});
Route::get('/list-nilai', function () {
    return view('pages.list-nilai');
});
Route::get('/list-user', function () {
    return view('pages.list-user');
});
Route::get('/list-mapel', function () {
    return view('pages.list-mapel');
});
Route::get('/list-guru', function () {
    return view('pages.list-guru');
});
Route::get('/list-class', function () {
    return view('pages.list-class');
});
