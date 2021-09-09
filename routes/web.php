<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;

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

Route::get('/',[AuthController::class, 'index']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/insert-user',function() {
    $data_user = [
        'name'          => 'Administrator',
        'username'      => 'admin',
        'password'      => bcrypt('admin'),
        'level_user'    => 2,
        'status_akun'   => 1,
        'status_delete' => 0
    ];

    App\Models\User::create($data_user);
});

Route::get('/admin/dashboard',[AdminDashboardController::class, 'index']);

Route::get('/dashboard1', function () {
    return view('layout-app/layout');
});

Route::get('/persentase', function () {
    return view('dashboard-persentase');
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

Route::get('/tambahkantin', function () {
    return view('kantin-tambah');
});

Route::get('/editkantin', function () {
    return view('kantin-edit');
});

Route::get('/tunggakansiswa', function () {
    return view('tunggakan');
});

Route::get('/tambahtunggakan', function () {
    return view('tunggakan-tambah');
});

Route::get('/edittunggakan', function () {
    return view('tunggakan-edit');
});

Route::get('/detailtunggakan', function () {
    return view('tunggakan-detail');
});

Route::get('/datatunggal', function () {
    return view('data-tunggal');
});

Route::get('/datatahunajar', function () {
    return view('data-tunggal-tahun-ajar');
});

Route::get('/tambahtahunajar', function () {
    return view('data-tunggal-tahun-ajar-tambah');
});

Route::get('/edittahunajar', function () {
    return view('data-tunggal-tahun-ajar-edit');
});

Route::get('/datakelas', function () {
    return view('data-tunggal-kelas');
});

Route::get('/detailkelas', function () {
    return view('data-tunggal-kelas-detail');
});