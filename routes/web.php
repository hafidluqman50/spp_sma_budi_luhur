<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard1', function () {
    return view('layout-app/layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/siswa', function () {
    return view('siswa');
});

Route::get('/kantin', function () {
    return view('kantin');
});

Route::get('/tambahsiswa', function () {
    return view('siswa-tambah');
});

Route::get('/importsiswa', function () {
    return view('siswa-import');
});