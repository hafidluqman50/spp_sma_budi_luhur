<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatatablesController;
use App\Http\Controllers\AjaxController;

// CONTROLLER ADMIN //
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\TahunAjaranController as AdminTahunAjaranController;
use App\Http\Controllers\Admin\KelasSiswaController as AdminKelasSiswaController;
use App\Http\Controllers\Admin\KantinController as AdminKantinController;
use App\Http\Controllers\Admin\KolomSppController as AdminKolomSppController;
use App\Http\Controllers\Admin\SppController as AdminSppController;
use App\Http\Controllers\Admin\SppBulanTahunController as AdminSppBulanTahunController;
use App\Http\Controllers\Admin\SppDetailController as AdminSppDetailController;
// END CONTROLLER ADMIN //

// CONTROLLER ORTU //
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
// END CONTROLLER ORTU //

// CONTROLLER PETUGAS //

// END CONTROLLER PETUGAS //

// CONTROLLER ORANG TUA //

// END CONTROLLER ORANG TUA //

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

// Route::get('/insert-user',function() {
//     $data_user = [
//         'name'          => 'Administrator',
//         'username'      => 'admin',
//         'password'      => bcrypt('admin'),
//         'level_user'    => 2,
//         'status_akun'   => 1,
//         'status_delete' => 0
//     ];

//     App\Models\User::create($data_user);
// });


Route::group(['middleware'=>'is.login'],function(){
    Route::get('/',[AuthController::class, 'index']);
    Route::post('/login',[AuthController::class, 'login']);
});
Route::get('/logout',[AuthController::class, 'logout']);

Route::group(['prefix' => 'ajax'],function() {
    // Route::get('/get-kelas-by-tahun-ajaran/{id}',[AjaxController::class, 'getKelasByTahunAjaran']);
    Route::get('/get-siswa/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getSiswa']);
});

Route::group(['prefix' => 'datatables'],function(){
    Route::get('/data-siswa',[DatatablesController::class, 'dataSiswa']);
    Route::get('/data-kelas',[DatatablesController::class, 'dataKelas']);
    Route::get('/data-tahun-ajaran',[DatatablesController::class, 'dataTahunAjaran']);
    Route::get('/data-kelas-siswa/{id}',[DatatablesController::class, 'dataKelasSiswa']);
    Route::get('/data-kantin',[DatatablesController::class, 'dataKantin']);
    Route::get('/data-kolom-spp',[DatatablesController::class, 'dataKolomSpp']);
    Route::get('/data-spp',[DatatablesController::class, 'dataSpp']);
    Route::get('/data-spp/bulan-tahun/{id}',[DatatablesController::class, 'dataSppBulanTahun']);
    Route::get('/data-spp/detail/{id}',[DatatablesController::class, 'dataSppDetail']);
    Route::get('/data-siswa-ortu',[DatatablesController::class, 'dataSiswaOrtu']);
    Route::get('/data-spp/spp-ortu/{id}',[DatatablesController::class, 'dataSppOrtu']);
    Route::get('/data-spp/spp-ortu/detail/{id}',[DatatablesController::class, 'dataSppOrtuDetail']);
});

Route::get('/oke',function(){
    echo "mantap";
});

Route::group(['prefix' => 'admin','middleware'=>'is.admin'],function() {
    Route::get('/dashboard',[AdminDashboardController::class, 'index']);

    // ROUTE SISWA //
    Route::get('/siswa',[AdminSiswaController::class, 'index']);
    Route::get('/siswa/tambah',[AdminSiswaController::class, 'tambah']);
    Route::get('/siswa/edit/{id}',[AdminSiswaController::class, 'edit']);
    Route::post('/siswa/save',[AdminSiswaController::class, 'save']);
    Route::put('/siswa/update/{id}',[AdminSiswaController::class, 'update']);
    Route::delete('/siswa/delete/{id}',[AdminSiswaController::class, 'delete']);
    // ROUTE SISWA END //

    // ROUTE KELAS //
    Route::get('/kelas',[AdminKelasController::class, 'index']);
    Route::get('/kelas/tambah',[AdminKelasController::class, 'tambah']);
    Route::get('/kelas/edit/{id}',[AdminKelasController::class, 'edit']);
    Route::post('/kelas/save',[AdminKelasController::class, 'save']);
    Route::put('/kelas/update/{id}',[AdminKelasController::class, 'update']);
    Route::delete('/kelas/delete/{id}',[AdminKelasController::class, 'delete']);
    // ROUTE KELAS END //

    // ROUTE TAHUN AJARAN //
    Route::get('/tahun-ajaran',[AdminTahunAjaranController::class, 'index']);
    Route::get('/tahun-ajaran/tambah',[AdminTahunAjaranController::class, 'tambah']);
    Route::get('/tahun-ajaran/edit/{id}',[AdminTahunAjaranController::class, 'edit']);
    Route::post('/tahun-ajaran/save',[AdminTahunAjaranController::class, 'save']);
    Route::put('/tahun-ajaran/update/{id}',[AdminTahunAjaranController::class, 'update']);
    Route::delete('/tahun-ajaran/delete/{id}',[AdminTahunAjaranController::class, 'delete']);
    // ROUTE TAHUN AJARAN END //

    // ROUTE KELAS SISWA //
    Route::get('/kelas/siswa/{id}',[AdminKelasSiswaController::class, 'index']);
    Route::get('/kelas/siswa/{id}/tambah',[AdminKelasSiswaController::class, 'tambah']);
    Route::post('/kelas/siswa/{id}/save',[AdminKelasSiswaController::class, 'save']);
    Route::get('/kelas/siswa/{id}/edit/{id_detail}',[AdminKelasSiswaController::class, 'edit']);
    Route::put('/kelas/siswa/{id}/update/{id_detail}',[AdminKelasSiswaController::class, 'update']);
    Route::delete('/kelas/siswa/{id}/delete/{id_detail}',[AdminKelasSiswaController::class, 'delete']);
    // ROUTE KELAS SISWA END //

    // ROUTE KANTIN //
    Route::get('/kantin',[AdminKantinController::class, 'index']);
    Route::get('/kantin/tambah',[AdminKantinController::class, 'tambah']);
    Route::post('/kantin/save',[AdminKantinController::class, 'save']);
    Route::get('/kantin/edit/{id}',[AdminKantinController::class, 'edit']);
    Route::put('/kantin/update/{id}',[AdminKantinController::class, 'update']);
    Route::delete('/kantin/delete/{id}',[AdminKantinController::class, 'delete']);
    // ROUTE KANTIN END //

    // ROUTE KOLOM SPP //
    Route::get('/kolom-spp',[AdminKolomSppController::class, 'index']);
    Route::get('/kolom-spp/tambah',[AdminKolomSppController::class, 'tambah']);
    Route::post('/kolom-spp/save',[AdminKolomSppController::class, 'save']);
    Route::get('/kolom-spp/edit/{id}',[AdminKolomSppController::class, 'edit']);
    Route::put('/kolom-spp/update/{id}',[AdminKolomSppController::class, 'update']);
    Route::delete('/kolom-spp/delete/{id}',[AdminKolomSppController::class, 'delete']);
    // END ROUTE KOLOM SPP //

    // ROUTE SPP //
    Route::get('/spp',[AdminSppController::class, 'index']);
    Route::get('/spp/tambah',[AdminSppController::class, 'tambah']);
    Route::post('/spp/save',[AdminSppController::class, 'save']);
    Route::delete('/spp/delete/{id}',[AdminSppController::class, 'delete']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/bulan-tahun/{id}',[AdminSppBulanTahunController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/delete{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'delete']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP DETAIL //
    Route::get('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}',[AdminSppDetailController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}/bayar-semua',[AdminSppDetailController::class, 'formBayarSemua']);
    Route::post('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}/bayar-semua/save',[AdminSppDetailController::class, 'bayarSemua']);
    Route::get('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}/bayar/{id_detail}',[AdminSppDetailController::class, 'formBayar']);
    Route::post('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}/bayar/{id_detail}/save',[AdminSppDetailController::class, 'bayar']);
    Route::get('/spp/bulan-tahun/{id}/detail/{id_bulan_tahun}/delete/{id_detail}',[AdminSppDetailController::class, 'formBayar']);
    // END ROUTE SPP DETAIL //

    // ROUTE TUNGGAKAN //
    Route::get('/spp-tunggakan');
    // END ROUTE TUNGGAKAN //  
});

Route::group(['prefix' => 'ortu','middleware' => 'is.ortu'],function(){
    Route::get('dashboard',[OrtuDashboardController::class, 'index']);
    Route::get('spp/{id}',[OrtuDashboardController::class, 'spp']);
    Route::get('spp/{id}/detail/{id_detail}',[OrtuDashboardController::class, 'detailSpp']);
});

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
    return view('Admin.siswa.main');
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
    return view('Admin.tahun-ajaran.main');
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