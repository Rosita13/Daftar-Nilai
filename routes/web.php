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
Route::get('/list-siswa', function () {
    return view('pages.list-siswa');
})->name('page.list-siswa');
Route::get('/list-nilai', function () {
    return view('pages.list-nilai');
})->name('page.list-nilai');
Route::get('/list-user', function () {
    return view('pages.list-user');
})->name('page.list-user');
Route::get('/list-mapel', function () {
    return view('pages.list-mapel');
})->name('page.list-mapel');
Route::get('/list-guru', function () {
    return view('pages.list-guru');
})->name('page.list-guru');
Route::get('/list-class', function () {
    return view('pages.list-class');
})->name('page.list-class');
Route::get('/create-class', function () {
    return view('pages.create-class');
})->name('page.create-class');
Route::get('/create-guru', function () {
    return view('pages.create-guru');
})->name('page.create-guru');
Route::get('/create-mapel', function () {
    return view('pages.create-mapel');
})->name('page.create-mapel');
Route::get('/create-user', function () {
    return view('pages.create-user');
})->name('page.create-user');
Route::get('/create-nilai', function () {
    return view('pages.create-nilai');
})->name('page.create-nilai');
Route::get('/create-siswa', function () {
    return view('pages.create-siswa');
})->name('page.create-siswa');
Route::get('/edit-siswa', function () {
    return view('pages.edit-siswa');
})->name('page.edit-siswa');
Route::get('/edit-nilai', function () {
    return view('pages.edit-nilai');
})->name('page.edit-nilai');
Route::get('/edit-user', function () {
    return view('pages.edit-user');
})->name('page.edit-user');
Route::get('/edit-mapel', function () {
    return view('pages.edit-mapel');
})->name('page.edit-mapel');
Route::get('/edit-guru', function () {
    return view('pages.edit-guru');
})->name('page.edit-guru');
Route::get('/edit-class', function () {
    return view('pages.edit-class');
})->name('page.edit-class');