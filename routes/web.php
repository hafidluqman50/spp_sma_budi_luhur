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
use App\Http\Controllers\Admin\PetugasController as AdminPetugasController;
use App\Http\Controllers\Admin\KepsekController as AdminKepsekController;
use App\Http\Controllers\Admin\HistorySppController as AdminHistorySppController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\DashboardRABController as AdminDashboardRABController;
// END CONTROLLER ADMIN //

// CONTROLLER PETUGAS //
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\KolomSppController as PetugasKolomSppController;
use App\Http\Controllers\Petugas\SppController as PetugasSppController;
use App\Http\Controllers\Petugas\SppBulanTahunController as PetugasSppBulanTahunController;
use App\Http\Controllers\Petugas\SppDetailController as PetugasSppDetailController;
use App\Http\Controllers\Petugas\HistorySppController as PetugasHistorySppController;
// END CONTROLLER PETUGAS //

// CONTROLLER KEPSEK //
use App\Http\Controllers\Kepsek\DashboardController as KepsekDashboardController;
use App\Http\Controllers\Kepsek\SiswaController as KepsekSiswaController;
use App\Http\Controllers\Kepsek\KelasController as KepsekKelasController;
use App\Http\Controllers\Kepsek\TahunAjaranController as KepsekTahunAjaranController;
use App\Http\Controllers\Kepsek\KelasSiswaController as KepsekKelasSiswaController;
use App\Http\Controllers\Kepsek\KantinController as KepsekKantinController;
use App\Http\Controllers\Kepsek\KolomSppController as KepsekKolomSppController;
use App\Http\Controllers\Kepsek\SppController as KepsekSppController;
use App\Http\Controllers\Kepsek\SppBulanTahunController as KepsekSppBulanTahunController;
use App\Http\Controllers\Kepsek\SppDetailController as KepsekSppDetailController;
use App\Http\Controllers\Kepsek\LaporanController as KepsekLaporanController;
use App\Http\Controllers\Kepsek\PetugasController as KepsekPetugasController;

// END CONTROLLER KEPSEK //

// CONTROLLER ORTU //
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
// END CONTROLLER ORTU //
use Twilio\Rest\Client; 

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


Route::get('/test-replace',function(){
    echo find_replace_strip('Januari, 2021 - Maret, 2021','Februari, 2022');
});

Route::group(['middleware'=>'is.login'],function(){
    Route::get('/',[AuthController::class, 'index']);
    Route::post('/login',[AuthController::class, 'login']);
});
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/test-whatsapp',function(){
 
$sid    = getenv('TWILLIO_AUTH_SID'); 
$token  = getenv('TWILLIO_AUTH_TOKEN'); 
$from   = getenv('TWILLIO_WHATSAPP_FROM');
$twilio = new Client($sid, $token);
 
$message = $twilio->messages 
                  ->create("whatsapp:+6285236894171", // to 
                           array( 
                               "from" => "whatsapp:$from",       
                               "body" => "Test BOSS" 
                           ) 
                  ); 
});

Route::get('/check-backwards-month',function(){

    $oldFigure = 0;
    $newFigure = 0;

    $percentChange = (1 - $oldFigure / $newFigure) * 100;

    echo $percentChange;
});

Route::group(['prefix' => 'ajax'],function() {
    // Route::get('/get-kelas-by-tahun-ajaran/{id}',[AjaxController::class, 'getKelasByTahunAjaran']);
    Route::get('/get-siswa/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getSiswa']);
    Route::get('/get-siswa-dashboard/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getSiswaDashboard']);
    Route::get('/get-tunggakan/{id_siswa}/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getTunggakan']);
    Route::get('/get-tunggakan-detail/{id_bulan_tahun}',[AjaxController::class, 'getTunggakanDetail']);
    Route::post('/get-bayar',[AjaxController::class, 'getBayar']);
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
    Route::get('/data-spp/bayar/{id}',[DatatablesController::class, 'dataSppBayar']);
    Route::get('/data-spp/bayar-detail/{id}',[DatatablesController::class, 'dataSppBayarDetail']);
    Route::get('/data-siswa-ortu',[DatatablesController::class, 'dataSiswaOrtu']);
    Route::get('/data-spp/spp-ortu/{id}',[DatatablesController::class, 'dataSppOrtu']);
    Route::get('/data-spp/spp-ortu/detail/{id}',[DatatablesController::class, 'dataSppOrtuDetail']);
    Route::get('/data-petugas',[DatatablesController::class, 'dataPetugas']);
    Route::get('/data-kepsek',[DatatablesController::class, 'dataKepsek']);
    Route::get('/data-history-spp',[DatatablesController::class, 'dataHistorySpp']);
    Route::get('/laporan-kantin',[DatatablesController::class, 'laporanKantin']);
    Route::get('/laporan-data-siswa',[DatatablesController::class, 'laporanDataSiswa']);
    Route::get('/laporan-tunggakan',[DatatablesController::class, 'laporanTunggakan']);
    Route::get('/laporan-rab',[DatatablesController::class, 'laporanRab']);
    Route::get('/transaksi-terakhir',[DatatablesController::class, 'transaksiTerakhir']);
});

Route::get('/oke',function(){
    echo "mantap";
});

Route::group(['prefix' => 'admin','middleware'=>'is.admin'],function() {
    Route::get('/dashboard',[AdminDashboardController::class, 'index']);
    Route::get('/dashboard/bayar-spp',[AdminDashboardController::class, 'bayarSppDashboard']);

    // ROUTE SISWA //
    Route::get('/siswa',[AdminSiswaController::class, 'index']);
    Route::get('/siswa/tambah',[AdminSiswaController::class, 'tambah']);
    Route::get('/siswa/edit/{id}',[AdminSiswaController::class, 'edit']);
    Route::post('/siswa/save',[AdminSiswaController::class, 'save']);
    Route::put('/siswa/update/{id}',[AdminSiswaController::class, 'update']);
    Route::delete('/siswa/delete/{id}',[AdminSiswaController::class, 'delete']);
    Route::get('/siswa/import',[AdminSiswaController::class, 'formImport']);
    Route::get('/siswa/contoh-import',[AdminSiswaController::class, 'contohImport']);
    Route::post('/siswa/import/save',[AdminSiswaController::class, 'import']);
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
    Route::get('/spp/import',[AdminSppController::class, 'formImport']);
    Route::get('/spp/contoh-import',[AdminSppController::class, 'contohImport']);
    Route::post('/spp/import/save',[AdminSppController::class, 'import']);
    Route::post('/spp/kantin/import/save',[AdminSppController::class, 'importSPPKantin']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/bulan-tahun/{id}',[AdminSppBulanTahunController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/edit/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'edit']);
    Route::put('/spp/bulan-tahun/{id}/update/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'update']);
    Route::delete('/spp/bulan-tahun/{id}/delete/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'delete']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}',[AdminSppDetailController::class, 'lihatPembayaran']);
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/detail/{id_spp_bayar}',[AdminSppDetailController::class, 'lihatPembayaranDetail']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/delete/{id_detail}',[AdminSppDetailController::class, 'lihatPembayaranDelete']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/detail/{id_spp_bayar}/delete/{id_spp_bayar_detail}',[AdminSppDetailController::class, 'lihatPembayaranDetailDelete']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}',[AdminSppDetailController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua',[AdminSppDetailController::class, 'formBayarSemua']);
    Route::post('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua/save',[AdminSppDetailController::class, 'bayarSemua']);
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}',[AdminSppDetailController::class, 'formBayar']);
    Route::post('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}/save',[AdminSppDetailController::class, 'bayar']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/delete/{id_detail}',[AdminSppDetailController::class, 'delete']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE SPP HISTORY //
    Route::get('/spp/history-spp',[AdminHistorySppController::class, 'index']);
    Route::get('/spp/history-spp/{id}',[AdminHistorySppController::class, 'detail']);
    // END ROUTE SPP HISTORY //

    // ROUTE DATA PETUGAS //
    Route::get('/data-petugas',[AdminPetugasController::class, 'index']);
    Route::get('/data-petugas/tambah',[AdminPetugasController::class, 'tambah']);
    Route::post('/data-petugas/save',[AdminPetugasController::class, 'save']);
    Route::get('/data-petugas/edit/{id}',[AdminPetugasController::class, 'edit']);
    Route::put('/data-petugas/update/{id}',[AdminPetugasController::class, 'update']);
    Route::delete('/data-petugas/delete/{id}',[AdminPetugasController::class, 'delete']);
    Route::get('/data-petugas/status-petugas/{id}',[AdminPetugasController::class, 'statusPetugas']);
    // END ROUTE DATA PETUGAS //

    // ROUTE DATA KEPSEK //
    Route::get('/data-kepsek',[AdminKepsekController::class, 'index']);
    Route::get('/data-kepsek/tambah',[AdminKepsekController::class, 'tambah']);
    Route::post('/data-kepsek/save',[AdminKepsekController::class, 'save']);
    Route::get('/data-kepsek/edit/{id}',[AdminKepsekController::class, 'edit']);
    Route::put('/data-kepsek/update/{id}',[AdminKepsekController::class, 'update']);
    Route::delete('/data-kepsek/delete/{id}',[AdminKepsekController::class, 'delete']);
    Route::get('/data-kepsek/status-kepsek/{id}',[AdminKepsekController::class, 'statusPetugas']);
    // END ROUTE DATA KEPSEK //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[AdminLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-data-siswa',[AdminLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-tunggakan',[AdminLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-rab',[AdminLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[AdminLaporanController::class, 'laporanCetak']);
    // END ROUTE LAPORAN //

    // ROUTE RAB //
    Route::get('/data-rab',[AdminDashboardRABController::class, 'index']);
});

Route::group(['prefix' => 'petugas', 'middleware' => 'is.petugas'],function(){
    Route::get('/dashboard',[PetugasDashboardController::class, 'index']);
    Route::get('/dashboard/bayar-spp',[PetugasDashboardController::class, 'bayarSppDashboard']);

    // ROUTE KOLOM SPP //
    Route::get('/kolom-spp',[PetugasKolomSppController::class, 'index']);
    Route::get('/kolom-spp/tambah',[PetugasKolomSppController::class, 'tambah']);
    Route::post('/kolom-spp/save',[PetugasKolomSppController::class, 'save']);
    Route::get('/kolom-spp/edit/{id}',[PetugasKolomSppController::class, 'edit']);
    Route::put('/kolom-spp/update/{id}',[PetugasKolomSppController::class, 'update']);
    Route::delete('/kolom-spp/delete/{id}',[PetugasKolomSppController::class, 'delete']);
    // END ROUTE KOLOM SPP //

    // ROUTE SPP //
    Route::get('/spp',[PetugasSppController::class, 'index']);
    Route::get('/spp/tambah',[PetugasSppController::class, 'tambah']);
    Route::post('/spp/save',[PetugasSppController::class, 'save']);
    Route::delete('/spp/delete/{id}',[PetugasSppController::class, 'delete']);
    Route::get('/spp/import',[PetugasSppController::class, 'formImport']);
    Route::get('/spp/contoh-import',[PetugasSppController::class, 'contohImport']);
    Route::post('/spp/import/save',[PetugasSppController::class, 'import']);
    Route::post('/spp/kantin/import/save',[PetugasSppController::class, 'importSPPKantin']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/bulan-tahun/{id}',[PetugasSppBulanTahunController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/edit/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'edit']);
    Route::put('/spp/bulan-tahun/{id}/update/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'update']);
    Route::delete('/spp/bulan-tahun/{id}/delete/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'delete']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}',[PetugasSppDetailController::class, 'lihatPembayaran']);
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/detail/{id_spp_bayar}',[PetugasSppDetailController::class, 'lihatPembayaranDetail']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/delete/{id_detail}',[PetugasSppDetailController::class, 'lihatPembayaranDelete']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/detail/{id_spp_bayar}/delete/{id_spp_bayar_detail}',[PetugasSppDetailController::class, 'lihatPembayaranDetailDelete']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}',[PetugasSppDetailController::class, 'index']);
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua',[PetugasSppDetailController::class, 'formBayarSemua']);
    Route::post('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua/save',[PetugasSppDetailController::class, 'bayarSemua']);
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}',[PetugasSppDetailController::class, 'formBayar']);
    Route::post('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}/save',[PetugasSppDetailController::class, 'bayar']);
    Route::delete('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}/delete/{id_detail}',[PetugasSppDetailController::class, 'delete']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE SPP HISTORY //
    Route::get('/spp/history-spp',[PetugasHistorySppController::class, 'index']);
    Route::get('/spp/history-spp/{id}',[PetugasHistorySppController::class, 'detail']);
    // END ROUTE SPP HISTORY //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[PetugasLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-data-siswa',[PetugasLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-tunggakan',[PetugasLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-rab',[PetugasLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[PetugasLaporanController::class, 'laporanCetak']);
    // END ROUTE LAPORAN //
});

Route::group(['prefix' => 'kepsek', 'middleware' => 'is.kepsek'],function(){
    Route::get('/dashboard',[KepsekDashboardController::class,'index']);

     // ROUTE SISWA //
    Route::get('/siswa',[KepsekSiswaController::class, 'index']);
    // ROUTE SISWA END //

    // ROUTE KELAS //
    Route::get('/kelas',[KepsekKelasController::class, 'index']);
    // ROUTE KELAS END //

    // ROUTE TAHUN AJARAN //
    Route::get('/tahun-ajaran',[KepsekTahunAjaranController::class, 'index']);
    // ROUTE TAHUN AJARAN END //

    // ROUTE KELAS SISWA //
    Route::get('/kelas/siswa/{id}',[KepsekKelasSiswaController::class, 'index']);
    // ROUTE KELAS SISWA END //

    // ROUTE KANTIN //
    Route::get('/kantin',[KepsekKantinController::class, 'index']);
    // ROUTE KANTIN END //

    // ROUTE KOLOM SPP //
    Route::get('/kolom-spp',[KepsekKolomSppController::class, 'index']);
    // END ROUTE KOLOM SPP //

    // ROUTE SPP //
    Route::get('/spp',[KepsekSppController::class, 'index']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/bulan-tahun/{id}',[KepsekSppBulanTahunController::class, 'index']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}',[KepsekSppDetailController::class, 'lihatPembayaran']);
    Route::get('/spp/bulan-tahun/{id}/lihat-pembayaran/{id_bulan_tahun}/detail/{id_spp_bayar}',[KepsekSppDetailController::class, 'lihatPembayaranDetail']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/bulan-tahun/{id}/lihat-spp/{id_bulan_tahun}',[KepsekSppDetailController::class, 'index']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[KepsekLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-data-siswa',[KepsekLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-tunggakan',[KepsekLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-rab',[KepsekLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[KepsekLaporanController::class, 'laporanCetak']);
    // END ROUTE LAPORAN //

    // ROUTE DATA PETUGAS //
    Route::get('/data-petugas',[KepsekPetugasController::class, 'index']);
    // END ROUTE DATA PETUGAS //
});

Route::group(['prefix' => 'ortu','middleware' => 'is.ortu'],function(){
    Route::get('/dashboard',[OrtuDashboardController::class, 'index']);
    Route::get('/spp/{id}',[OrtuDashboardController::class, 'spp']);
    Route::get('/spp/{id}/detail/{id_detail}',[OrtuDashboardController::class, 'detailSpp']);
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

Route::get('/struk', function () {
    return view('Admin/struk');
});