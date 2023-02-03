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
use App\Http\Controllers\Admin\SppBayarDataController as AdminSppBayarDataController;
use App\Http\Controllers\Admin\SppBayarController as AdminSppBayarController;
use App\Http\Controllers\Admin\SppBayarDetailController as AdminSppBayarDetailController;
use App\Http\Controllers\Admin\HistorySppController as AdminHistorySppController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\RincianPengeluaranController as AdminRincianPengeluaranController;
use App\Http\Controllers\Admin\RincianPengeluaranDetailController as AdminRincianPengeluaranDetailController;
use App\Http\Controllers\Admin\RincianPembelanjaanController as AdminRincianPembelanjaanController;
use App\Http\Controllers\Admin\RincianPengajuanController as AdminRincianPengajuanController;
use App\Http\Controllers\Admin\RincianPenerimaanController as AdminRincianPenerimaanController;
use App\Http\Controllers\Admin\RincianPenerimaanDetailController as AdminRincianPenerimaanDetailController;
use App\Http\Controllers\Admin\RincianPenerimaanRekapController as AdminRincianPenerimaanRekapController;
use App\Http\Controllers\Admin\RincianPenerimaanTahunAjaranController as AdminRincianPenerimaanTahunAjaranController;
use App\Http\Controllers\Admin\SaprasController as AdminSaprasController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\TelegramDataController as AdminTelegramDataController;
// END CONTROLLER ADMIN //

// CONTROLLER PETUGAS //
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\SiswaController as PetugasSiswaController;
use App\Http\Controllers\Petugas\KelasController as PetugasKelasController;
use App\Http\Controllers\Petugas\TahunAjaranController as PetugasTahunAjaranController;
use App\Http\Controllers\Petugas\KelasSiswaController as PetugasKelasSiswaController;
use App\Http\Controllers\Petugas\KantinController as PetugasKantinController;
use App\Http\Controllers\Petugas\KolomSppController as PetugasKolomSppController;
use App\Http\Controllers\Petugas\SppController as PetugasSppController;
use App\Http\Controllers\Petugas\SppBulanTahunController as PetugasSppBulanTahunController;
use App\Http\Controllers\Petugas\SppDetailController as PetugasSppDetailController;
use App\Http\Controllers\Petugas\SppBayarDataController as PetugasSppBayarDataController;
use App\Http\Controllers\Petugas\SppBayarController as PetugasSppBayarController;
use App\Http\Controllers\Petugas\SppBayarDetailController as PetugasSppBayarDetailController;
use App\Http\Controllers\Petugas\HistorySppController as PetugasHistorySppController;
use App\Http\Controllers\Petugas\LaporanController as PetugasLaporanController;
use App\Http\Controllers\Petugas\DashboardRABController as PetugasDashboardRABController;
use App\Http\Controllers\Petugas\RincianPengeluaranController as PetugasRincianPengeluaranController;
use App\Http\Controllers\Petugas\RincianPengeluaranDetailController as PetugasRincianPengeluaranDetailController;
use App\Http\Controllers\Petugas\RincianPembelanjaanController as PetugasRincianPembelanjaanController;
use App\Http\Controllers\Petugas\RincianPengajuanController as PetugasRincianPengajuanController;
use App\Http\Controllers\Petugas\RincianPenerimaanController as PetugasRincianPenerimaanController;
use App\Http\Controllers\Petugas\RincianPenerimaanDetailController as PetugasRincianPenerimaanDetailController;
use App\Http\Controllers\Petugas\RincianPenerimaanRekapController as PetugasRincianPenerimaanRekapController;
use App\Http\Controllers\Petugas\RincianPenerimaanTahunAjaranController as PetugasRincianPenerimaanTahunAjaranController;
use App\Http\Controllers\Petugas\SaprasController as PetugasSaprasController;
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
use App\Http\Controllers\Kepsek\SppBayarDataController as KepsekSppBayarDataController;
use App\Http\Controllers\Kepsek\SppBayarController as KepsekSppBayarController;
use App\Http\Controllers\Kepsek\SppBayarDetailController as KepsekSppBayarDetailController;
use App\Http\Controllers\Kepsek\HistorySppController as KepsekHistorySppController;
use App\Http\Controllers\Kepsek\LaporanController as KepsekLaporanController;
use App\Http\Controllers\Kepsek\DashboardRABController as KepsekDashboardRABController;
use App\Http\Controllers\Kepsek\RincianPengeluaranController as KepsekRincianPengeluaranController;
use App\Http\Controllers\Kepsek\RincianPengeluaranDetailController as KepsekRincianPengeluaranDetailController;
use App\Http\Controllers\Kepsek\RincianPembelanjaanController as KepsekRincianPembelanjaanController;
use App\Http\Controllers\Kepsek\RincianPengajuanController as KepsekRincianPengajuanController;
use App\Http\Controllers\Kepsek\RincianPenerimaanController as KepsekRincianPenerimaanController;
use App\Http\Controllers\Kepsek\RincianPenerimaanDetailController as KepsekRincianPenerimaanDetailController;
use App\Http\Controllers\Kepsek\RincianPenerimaanRekapController as KepsekRincianPenerimaanRekapController;
use App\Http\Controllers\Kepsek\RincianPenerimaanTahunAjaranController as KepsekRincianPenerimaanTahunAjaranController;
use App\Http\Controllers\Kepsek\SaprasController as KepsekSaprasController;

// END CONTROLLER KEPSEK //

// CONTROLLER ORTU //
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
use App\Http\Controllers\Ortu\SppBulanTahunController as OrtuSppBulanTahunController;
use App\Http\Controllers\Ortu\SppBayarDataController as OrtuSppBayarDataController;
use App\Http\Controllers\Ortu\SppBayarController as OrtuSppBayarController;
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
    // echo find_replace_strip('Januari, 2021 - Maret, 2021','Februari, 2022');
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

Route::get('/helper-baru',function(){
    echo bulan_tahun_excel('Januari, 2021');
});

Route::get('/test-increment',function(){
    // $var = 'C';
    // for ($i=0; $i < 100; $i++) { 
    //     echo $var.'<br>';
    //     $var++;
    // }
    echo vertical_text('Agustus');
});

Route::group(['prefix' => 'ajax'],function() {
    // Route::get('/get-kelas-by-tahun-ajaran/{id}',[AjaxController::class, 'getKelasByTahunAjaran']);
    Route::get('/get-siswa/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getSiswa']);
    Route::get('/get-siswa-dashboard/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getSiswaDashboard']);
    Route::get('/get-tunggakan/{id_siswa}/{id_kelas}/{id_tahun_ajaran}',[AjaxController::class, 'getTunggakan']);
    Route::get('/get-tunggakan-detail/{id_bulan_tahun}',[AjaxController::class, 'getTunggakanDetail']);
    Route::post('/get-bayar',[AjaxController::class, 'getBayar']);
    Route::get('/get-rincian',[AjaxController::class, 'getRincian']);
    // Route::get('/get-rincian',[AjaxController::class, 'getRincian']);
    Route::get('/get-rab',[AjaxController::class, 'getRab']);
    Route::get('/get-keluarga-siswa/{id_siswa}',[AjaxController::class, 'getKeluargaSiswa']);
    Route::get('/get-pendapatan-spp',[AjaxController::class, 'getPendapatanSpp']);
    Route::get('/get-penerimaan-rab',[AjaxController::class, 'getPenerimaanRab']);
    Route::get('/get-pemasukan-uang-makan',[AjaxController::class, 'getPemasukanUangMakan']);
    Route::get('/get-pemasukan-kantin',[AjaxController::class, 'getPemasukanKantin']);
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
    Route::get('/data-spp/bayar/{id}',[DatatablesController::class, 'dataSppBayarData']);
    Route::get('/data-spp/bayar/bulan-tahun/{id}',[DatatablesController::class, 'dataSppBayar']);
    Route::get('/data-spp/bayar-detail/{id}',[DatatablesController::class, 'dataSppBayarDetail']);
    Route::get('/data-siswa-ortu',[DatatablesController::class, 'dataSiswaOrtu']);
    Route::get('/data-spp/spp-ortu/{id}',[DatatablesController::class, 'dataSppOrtu']);
    Route::get('/data-spp/spp-ortu/detail/{id}',[DatatablesController::class, 'dataSppOrtuDetail']);
    Route::get('/data-users',[DatatablesController::class, 'dataUsers']);
    Route::get('/data-kepsek',[DatatablesController::class, 'dataKepsek']);
    Route::get('/data-history-spp',[DatatablesController::class, 'dataHistorySpp']);
    Route::get('/laporan-kantin',[DatatablesController::class, 'laporanKantin']);
    Route::get('/laporan-data-siswa',[DatatablesController::class, 'laporanDataSiswa']);
    Route::get('/laporan-tunggakan',[DatatablesController::class, 'laporanTunggakan']);
    Route::get('/laporan-rab',[DatatablesController::class, 'laporanRab']);
    Route::get('/transaksi-terakhir',[DatatablesController::class, 'transaksiTerakhir']);
    Route::get('/data-rincian-pengeluaran',[DatatablesController::class, 'dataRincianPengeluaran']);
    Route::get('/data-rincian-pengeluaran-sekolah/{id}',[DatatablesController::class, 'dataRincianPengeluaranSekolah']);
    Route::get('/data-rincian-pengeluaran-uang-makan/{id}',[DatatablesController::class, 'dataRincianPengeluaranUangMakan']);
    Route::get('/data-rincian-pembelanjaan/{id}/{ket}',[DatatablesController::class, 'dataRincianPembelanjaan']);
    Route::get('/data-rincian-pembelanjaan-tahun-ajaran/{id}',[DatatablesController::class, 'dataRincianPembelanjaanTahunAjaran']);
    Route::get('/data-rincian-pengajuan/{id}',[DatatablesController::class, 'dataRincianPengajuan']);
    Route::get('/data-sapras/{id}',[DatatablesController::class, 'dataSapras']);
    Route::get('/data-rincian-penerimaan/{id}',[DatatablesController::class, 'dataRincianPenerimaan']);
    Route::get('/data-rincian-penerimaan-detail/{id}',[DatatablesController::class, 'dataRincianPenerimaanDetail']);
    Route::get('/data-rincian-penerimaan-rekap/{id}',[DatatablesController::class, 'dataRincianPenerimaanRekap']);
    Route::get('/data-rincian-penerimaan-tahun-ajaran/{id}',[DatatablesController::class, 'dataRincianPenerimaanTahunAjaran']);
    Route::get('/data-spp/pemasukan-kantin/{id}',[DatatablesController::class, 'dataPemasukanKantin']);
    Route::get('/data-telegram',[DatatablesController::class, 'dataTelegramData']);
});

Route::get('/oke',function(){
    echo "mantap";
});

Route::group(['prefix' => 'admin','middleware'=>'is.admin'],function() {
    Route::get('/dashboard',[AdminDashboardController::class, 'index']);
    Route::post('/dashboard/bayar-tunggakan',[AdminDashboardController::class, 'bayarTunggakan']);
    Route::get('/dashboard/bayar-spp',[AdminDashboardController::class, 'bayarSppDashboard']);
    Route::get('/settings',[AdminDashboardController::class, 'settings']);
    Route::post('/settings/save',[AdminDashboardController::class, 'saveSettings']);

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
    Route::get('/kelas/naik-kelas',[AdminKelasController::class, 'naikKelasForm']);
    Route::post('/kelas/naik-kelas/save',[AdminKelasController::class, 'naikKelasSave']);
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
    Route::get('/spp/kalkulasi-ulang',[AdminSppController::class, 'kalkulasiUlang']);
    Route::get('/spp/bulan-tahun-numeric',[AdminSppController::class, 'bulanTahunNumeric']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/tunggakan/{id}',[AdminSppBulanTahunController::class, 'index']);
    Route::get('/spp/tunggakan/{id}/edit/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'edit']);
    Route::put('/spp/tunggakan/{id}/update/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'update']);
    Route::delete('/spp/tunggakan/{id}/delete/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'delete']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/pembayaran/{id}',[AdminSppBayarDataController::class, 'index']);
    Route::get('/spp/pembayaran/{id}/cetak-struk/{id_spp_bayar_data}',[AdminSppBayarDataController::class, 'cetakStruk']);
    Route::delete('/spp/pembayaran/{id}/delete/{id_spp_bayar_data}',[AdminSppBayarDataController::class, 'delete']);
    Route::get('/spp/pembayaran/{id}/retur-bayar/{id_spp_bayar_data}',[AdminSppBayarDataController::class, 'returBayar']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}',[AdminSppBayarController::class, 'index']);
    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/retur-bayar/{id_spp_bayar}',[AdminSppBayarController::class, 'returBayar']);
    Route::delete('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/delete/{id_spp_bayar}',[AdminSppBayarController::class, 'delete']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/detail/{id_spp_bayar}',[AdminSppBayarDetailController::class, 'index']);
    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/detail/{id_spp_bayar}/retur-bayar/{id_spp_bayar_detail}',[AdminSppBayarDetailController::class, 'returBayar']);
    Route::delete('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/detail/{id_spp_bayar}/delete/{id_spp_bayar_detail}',[AdminSppBayarDetailController::class, 'delete']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT PEMASUKAN KANTIN //
    Route::get('/spp/tunggakan/{id}/lihat-pemasukan-kantin/{id_bulan_tahun}',[AdminSppBulanTahunController::class, 'lihatPemasukanKantin']);
    Route::delete('/spp/tunggakan/{id}/lihat-pemasukan-kantin/{id_bulan_tahun}/delete/{id_pemasukan_kantin}',[AdminSppBulanTahunController::class, 'deletePemasukanKantin']);
    // END ROUTE SPP LIHAT PEMASUKAN KANTIN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}',[AdminSppDetailController::class, 'index']);
    
    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua',[AdminSppDetailController::class, 'formBayarSemua']);
    Route::post('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua/save',[AdminSppDetailController::class, 'bayarSemua']);

    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}',[AdminSppDetailController::class, 'formBayar']);
    Route::post('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}/save',[AdminSppDetailController::class, 'bayar']);
    Route::delete('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/delete/{id_detail}',[AdminSppDetailController::class, 'delete']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE SPP HISTORY //
    Route::get('/spp/history-spp',[AdminHistorySppController::class, 'index']);
    Route::get('/spp/history-spp/{id}',[AdminHistorySppController::class, 'detail']);
    // END ROUTE SPP HISTORY //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[AdminLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-kantin/lihat-data',[AdminLaporanController::class, 'laporanKantinLihatData']);
    Route::get('/laporan-data-siswa',[AdminLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-data-siswa/lihat-data',[AdminLaporanController::class, 'laporanDataSiswaLihatData']);
    Route::get('/laporan-tunggakan',[AdminLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-tunggakan/lihat-data',[AdminLaporanController::class, 'laporanTunggakanLihatData']);
    Route::get('/laporan-rab',[AdminLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[AdminLaporanController::class, 'laporanCetak']);
    Route::get('/laporan-pembukuan',[AdminLaporanController::class, 'laporanPembukuanView']);
    Route::get('/laporan-pembukuan/lihat-data',[AdminLaporanController::class, 'laporanPembukuanLihatData']);
    // END ROUTE LAPORAN //

    // ROUTE RAB //
    Route::get('/data-perincian-rab',[AdminRincianPengeluaranController::class,'index']);
    Route::get('/data-perincian-rab/tambah',[AdminRincianPengeluaranController::class,'tambah']);
    Route::post('/data-perincian-rab/save',[AdminRincianPengeluaranController::class,'save']);
    Route::get('/data-perincian-rab/edit/{id}',[AdminRincianPengeluaranController::class,'edit']);
    Route::put('/data-perincian-rab/update/{id}',[AdminRincianPengeluaranController::class,'update']);
    Route::delete('/data-perincian-rab/delete/{id}',[AdminRincianPengeluaranController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengeluaran/{id}',[AdminRincianPengeluaranDetailController::class,'index']);
    Route::get('/data-perincian-rab/rincian-pengeluaran/{id}/delete/{id_detail}',[AdminRincianPengeluaranDetailController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengeluaran-uang-makan/{id}',[AdminRincianPengeluaranController::class,'lihatRincianPengeluaranUangMakan']);
    Route::get('/data-perincian-rab/rincian-pengeluaran-uang-makan/{id}/delete/{id_detail}',[AdminRincianPengeluaranController::class,'deleteRincianPengeluaranUangMakan']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}',[AdminRincianPembelanjaanController::class,'rincianPembelanjaan']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}/tambah',[AdminRincianPembelanjaanController::class,'tambahRincianPembelanjaan']);
    Route::post('/data-perincian-rab/rincian-pembelanjaan/{id}/save',[AdminRincianPembelanjaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}/edit',[AdminRincianPembelanjaanController::class,'editRincianPembelanjaan']);
    Route::put('/data-perincian-rab/rincian-pembelanjaan/{id}/update',[AdminRincianPembelanjaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pembelanjaan/{id}/delete/{id_detail}',[AdminRincianPembelanjaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}',[AdminRincianPembelanjaanController::class,'rincianPembelanjaanUangMakan']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/tambah',[AdminRincianPembelanjaanController::class,'tambahRincianPembelanjaanUangMakan']);
    Route::post('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/save',[AdminRincianPembelanjaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/edit',[AdminRincianPembelanjaanController::class,'editRincianPembelanjaanUangMakan']);
    Route::put('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/update',[AdminRincianPembelanjaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/delete/{id_detail}',[AdminRincianPembelanjaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-penerimaan/{id}',[AdminRincianPenerimaanController::class,'index']);
    Route::get('/data-perincian-rab/rincian-penerimaan/{id}/tambah',[AdminRincianPenerimaanController::class,'tambah']);
    Route::post('/data-perincian-rab/rincian-penerimaan/{id}/save',[AdminRincianPenerimaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-penerimaan/{id}/edit',[AdminRincianPenerimaanController::class,'edit']);
    Route::put('/data-perincian-rab/rincian-penerimaan/{id}/update',[AdminRincianPenerimaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-penerimaan/{id}/delete',[AdminRincianPenerimaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengajuan/{id}',[AdminRincianPengajuanController::class,'index']);
    Route::get('/data-perincian-rab/rincian-pengajuan/{id}/tambah',[AdminRincianPengajuanController::class,'tambah']);
    Route::post('/data-perincian-rab/rincian-pengajuan/{id}/save',[AdminRincianPengajuanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pengajuan/{id}/edit',[AdminRincianPengajuanController::class,'edit']);
    Route::put('/data-perincian-rab/rincian-pengajuan/{id}/update',[AdminRincianPengajuanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pengajuan/{id}/delete/{id_detail}',[AdminRincianPengajuanController::class,'delete']);

    Route::get('/data-perincian-rab/sapras/{id}',[AdminSaprasController::class,'index']);
    Route::get('/data-perincian-rab/sapras/{id}/tambah',[AdminSaprasController::class,'tambah']);
    Route::post('/data-perincian-rab/sapras/{id}/save',[AdminSaprasController::class,'save']);
    Route::get('/data-perincian-rab/sapras/{id}/edit',[AdminSaprasController::class,'edit']);
    Route::put('/data-perincian-rab/sapras/{id}/update',[AdminSaprasController::class,'update']);
    Route::delete('/data-perincian-rab/sapras/{id}/delete/{id_detail}',[AdminSaprasController::class,'delete']);

    // ROUTE CRUD DATA USERS //
    Route::get('/data-users',[AdminUsersController::class, 'index']);
    Route::get('/data-users/tambah',[AdminUsersController::class, 'tambah']);
    Route::post('/data-users/save',[AdminUsersController::class, 'save']);
    Route::get('/data-users/edit/{id}',[AdminUsersController::class, 'edit']);
    Route::put('/data-users/update/{id}',[AdminUsersController::class, 'update']);
    Route::delete('/data-users/delete',[AdminUsersController::class, 'delete']);
    Route::get('/data-users/status-users/{id}',[AdminUsersController::class, 'statusPetugas']);
    // END ROUTE DATA USERS //

    // ROUTE CRUD DATA TELEGRAM //
    Route::get('/data-telegram',[AdminTelegramDataController::class, 'index']);
    Route::get('/data-telegram/tambah',[AdminTelegramDataController::class, 'tambah']);
    Route::post('/data-telegram/save',[AdminTelegramDataController::class, 'save']);
    Route::get('/data-telegram/edit/{id}',[AdminTelegramDataController::class, 'edit']);
    Route::put('/data-telegram/update/{id}',[AdminTelegramDataController::class, 'update']);
    Route::delete('/data-telegram/delete/{id}',[AdminTelegramDataController::class, 'delete']);
    // END ROUTE CRUD DATA TELEGRAM //

    Route::get('/panduan-notifikasi',[AdminTelegramDataController::class, 'panduanNotifikasi']);
});



Route::group(['prefix' => 'petugas','middleware'=>'is.petugas'],function() {
    Route::get('/dashboard',[PetugasDashboardController::class, 'index']);
    Route::post('/dashboard/bayar-tunggakan',[PetugasDashboardController::class, 'bayarTunggakan']);
    Route::get('/dashboard/bayar-spp',[PetugasDashboardController::class, 'bayarSppDashboard']);
    Route::get('/settings',[PetugasDashboardController::class, 'settings']);
    Route::post('/settings/save',[PetugasDashboardController::class, 'saveSettings']);

    // ROUTE SISWA //
    Route::get('/siswa',[PetugasSiswaController::class, 'index']);
    Route::get('/siswa/tambah',[PetugasSiswaController::class, 'tambah']);
    Route::get('/siswa/edit/{id}',[PetugasSiswaController::class, 'edit']);
    Route::post('/siswa/save',[PetugasSiswaController::class, 'save']);
    Route::put('/siswa/update/{id}',[PetugasSiswaController::class, 'update']);
    Route::delete('/siswa/delete/{id}',[PetugasSiswaController::class, 'delete']);
    Route::get('/siswa/import',[PetugasSiswaController::class, 'formImport']);
    Route::get('/siswa/contoh-import',[PetugasSiswaController::class, 'contohImport']);
    Route::post('/siswa/import/save',[PetugasSiswaController::class, 'import']);
    // ROUTE SISWA END //

    // ROUTE KELAS //
    Route::get('/kelas',[PetugasKelasController::class, 'index']);
    Route::get('/kelas/tambah',[PetugasKelasController::class, 'tambah']);
    Route::get('/kelas/edit/{id}',[PetugasKelasController::class, 'edit']);
    Route::post('/kelas/save',[PetugasKelasController::class, 'save']);
    Route::put('/kelas/update/{id}',[PetugasKelasController::class, 'update']);
    Route::delete('/kelas/delete/{id}',[PetugasKelasController::class, 'delete']);
    Route::get('/kelas/naik-kelas',[PetugasKelasController::class, 'naikKelasForm']);
    Route::post('/kelas/naik-kelas/save',[PetugasKelasController::class, 'naikKelasSave']);
    // ROUTE KELAS END //

    // ROUTE TAHUN AJARAN //
    Route::get('/tahun-ajaran',[PetugasTahunAjaranController::class, 'index']);
    Route::get('/tahun-ajaran/tambah',[PetugasTahunAjaranController::class, 'tambah']);
    Route::get('/tahun-ajaran/edit/{id}',[PetugasTahunAjaranController::class, 'edit']);
    Route::post('/tahun-ajaran/save',[PetugasTahunAjaranController::class, 'save']);
    Route::put('/tahun-ajaran/update/{id}',[PetugasTahunAjaranController::class, 'update']);
    Route::delete('/tahun-ajaran/delete/{id}',[PetugasTahunAjaranController::class, 'delete']);
    // ROUTE TAHUN AJARAN END //

    // ROUTE KELAS SISWA //
    Route::get('/kelas/siswa/{id}',[PetugasKelasSiswaController::class, 'index']);
    Route::get('/kelas/siswa/{id}/tambah',[PetugasKelasSiswaController::class, 'tambah']);
    Route::post('/kelas/siswa/{id}/save',[PetugasKelasSiswaController::class, 'save']);
    Route::get('/kelas/siswa/{id}/edit/{id_detail}',[PetugasKelasSiswaController::class, 'edit']);
    Route::put('/kelas/siswa/{id}/update/{id_detail}',[PetugasKelasSiswaController::class, 'update']);
    Route::delete('/kelas/siswa/{id}/delete/{id_detail}',[PetugasKelasSiswaController::class, 'delete']);
    // ROUTE KELAS SISWA END //

    // ROUTE KANTIN //
    Route::get('/kantin',[PetugasKantinController::class, 'index']);
    Route::get('/kantin/tambah',[PetugasKantinController::class, 'tambah']);
    Route::post('/kantin/save',[PetugasKantinController::class, 'save']);
    Route::get('/kantin/edit/{id}',[PetugasKantinController::class, 'edit']);
    Route::put('/kantin/update/{id}',[PetugasKantinController::class, 'update']);
    Route::delete('/kantin/delete/{id}',[PetugasKantinController::class, 'delete']);
    // ROUTE KANTIN END //

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
    Route::get('/spp/kalkulasi-ulang',[PetugasSppController::class, 'kalkulasiUlang']);
    Route::get('/spp/bulan-tahun-numeric',[PetugasSppController::class, 'bulanTahunNumeric']);
    // ROUTE SPP END //

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/tunggakan/{id}',[PetugasSppBulanTahunController::class, 'index']);
    Route::get('/spp/tunggakan/{id}/edit/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'edit']);
    Route::put('/spp/tunggakan/{id}/update/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'update']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/pembayaran/{id}',[PetugasSppBayarDataController::class, 'index']);
    Route::get('/spp/pembayaran/{id}/cetak-struk/{id_spp_bayar_data}',[PetugasSppBayarDataController::class, 'cetakStruk']);
    Route::get('/spp/pembayaran/{id}/retur-bayar/{id_spp_bayar_data}',[PetugasSppBayarDataController::class, 'returBayar']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}',[PetugasSppBayarController::class, 'index']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/detail/{id_spp_bayar}',[PetugasSppBayarDetailController::class, 'index']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT PEMASUKAN KANTIN //
    Route::get('/spp/tunggakan/{id}/lihat-pemasukan-kantin/{id_bulan_tahun}',[PetugasSppBulanTahunController::class, 'lihatPemasukanKantin']);
    // END ROUTE SPP LIHAT PEMASUKAN KANTIN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}',[PetugasSppDetailController::class, 'index']);
    
    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua',[PetugasSppDetailController::class, 'formBayarSemua']);
    Route::post('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar-semua/save',[PetugasSppDetailController::class, 'bayarSemua']);

    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}',[PetugasSppDetailController::class, 'formBayar']);
    Route::post('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}/bayar/{id_detail}/save',[PetugasSppDetailController::class, 'bayar']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE SPP HISTORY //
    Route::get('/spp/history-spp',[PetugasHistorySppController::class, 'index']);
    Route::get('/spp/history-spp/{id}',[PetugasHistorySppController::class, 'detail']);
    // END ROUTE SPP HISTORY //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[PetugasLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-kantin/lihat-data',[PetugasLaporanController::class, 'laporanKantinLihatData']);
    Route::get('/laporan-data-siswa',[PetugasLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-data-siswa/lihat-data',[PetugasLaporanController::class, 'laporanDataSiswaLihatData']);
    Route::get('/laporan-tunggakan',[PetugasLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-tunggakan/lihat-data',[PetugasLaporanController::class, 'laporanTunggakanLihatData']);
    Route::get('/laporan-rab',[PetugasLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[PetugasLaporanController::class, 'laporanCetak']);
    Route::get('/laporan-pembukuan',[PetugasLaporanController::class, 'laporanPembukuanView']);
    Route::get('/laporan-pembukuan/lihat-data',[PetugasLaporanController::class, 'laporanPembukuanLihatData']);
    // END ROUTE LAPORAN //

    // ROUTE RAB //

    Route::get('/data-perincian-rab',[PetugasRincianPengeluaranController::class,'index']);
    Route::get('/data-perincian-rab/tambah',[PetugasRincianPengeluaranController::class,'tambah']);
    Route::post('/data-perincian-rab/save',[PetugasRincianPengeluaranController::class,'save']);
    Route::get('/data-perincian-rab/edit/{id}',[PetugasRincianPengeluaranController::class,'edit']);
    Route::put('/data-perincian-rab/update/{id}',[PetugasRincianPengeluaranController::class,'update']);
    Route::delete('/data-perincian-rab/delete/{id}',[PetugasRincianPengeluaranController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengeluaran/{id}',[PetugasRincianPengeluaranDetailController::class,'index']);
    Route::get('/data-perincian-rab/rincian-pengeluaran/{id}/delete/{id_detail}',[PetugasRincianPengeluaranDetailController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengeluaran-uang-makan/{id}',[PetugasRincianPengeluaranController::class,'lihatRincianPengeluaranUangMakan']);
    Route::get('/data-perincian-rab/rincian-pengeluaran-uang-makan/{id}/delete/{id_detail}',[PetugasRincianPengeluaranController::class,'deleteRincianPengeluaranUangMakan']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}',[PetugasRincianPembelanjaanController::class,'rincianPembelanjaan']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}/tambah',[PetugasRincianPembelanjaanController::class,'tambahRincianPembelanjaan']);
    Route::post('/data-perincian-rab/rincian-pembelanjaan/{id}/save',[PetugasRincianPembelanjaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}/edit',[PetugasRincianPembelanjaanController::class,'editRincianPembelanjaan']);
    Route::put('/data-perincian-rab/rincian-pembelanjaan/{id}/update',[PetugasRincianPembelanjaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pembelanjaan/{id}/delete/{id_detail}',[PetugasRincianPembelanjaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}',[PetugasRincianPembelanjaanController::class,'rincianPembelanjaanUangMakan']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/tambah',[PetugasRincianPembelanjaanController::class,'tambahRincianPembelanjaanUangMakan']);
    Route::post('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/save',[PetugasRincianPembelanjaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/edit',[PetugasRincianPembelanjaanController::class,'editRincianPembelanjaanUangMakan']);
    Route::put('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/update',[PetugasRincianPembelanjaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}/delete/{id_detail}',[PetugasRincianPembelanjaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-penerimaan/{id}',[PetugasRincianPenerimaanController::class,'index']);
    Route::get('/data-perincian-rab/rincian-penerimaan/{id}/tambah',[PetugasRincianPenerimaanController::class,'tambah']);
    Route::post('/data-perincian-rab/rincian-penerimaan/{id}/save',[PetugasRincianPenerimaanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-penerimaan/{id}/edit',[PetugasRincianPenerimaanController::class,'edit']);
    Route::put('/data-perincian-rab/rincian-penerimaan/{id}/update',[PetugasRincianPenerimaanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-penerimaan/{id}/delete',[PetugasRincianPenerimaanController::class,'delete']);

    Route::get('/data-perincian-rab/rincian-pengajuan/{id}',[PetugasRincianPengajuanController::class,'index']);
    Route::get('/data-perincian-rab/rincian-pengajuan/{id}/tambah',[PetugasRincianPengajuanController::class,'tambah']);
    Route::post('/data-perincian-rab/rincian-pengajuan/{id}/save',[PetugasRincianPengajuanController::class,'save']);
    Route::get('/data-perincian-rab/rincian-pengajuan/{id}/edit',[PetugasRincianPengajuanController::class,'edit']);
    Route::put('/data-perincian-rab/rincian-pengajuan/{id}/update',[PetugasRincianPengajuanController::class,'update']);
    Route::delete('/data-perincian-rab/rincian-pengajuan/{id}/delete/{id_detail}',[PetugasRincianPengajuanController::class,'delete']);

    Route::get('/data-perincian-rab/sapras/{id}',[PetugasSaprasController::class,'index']);
    Route::get('/data-perincian-rab/sapras/{id}/tambah',[PetugasSaprasController::class,'tambah']);
    Route::post('/data-perincian-rab/sapras/{id}/save',[PetugasSaprasController::class,'save']);
    Route::get('/data-perincian-rab/sapras/{id}/edit',[PetugasSaprasController::class,'edit']);
    Route::put('/data-perincian-rab/sapras/{id}/update',[PetugasSaprasController::class,'update']);
    Route::delete('/data-perincian-rab/sapras/{id}/delete/{id_detail}',[PetugasSaprasController::class,'delete']);
});

Route::group(['prefix' => 'kepsek', 'middleware' => 'is.kepsek'],function(){
    Route::get('/dashboard',[KepsekDashboardController::class, 'index']);
    Route::get('/settings',[KepsekDashboardController::class, 'settings']);
    Route::post('/settings/save',[KepsekDashboardController::class, 'saveSettings']);

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
    Route::get('/spp/tunggakan/{id}',[KepsekSppBulanTahunController::class, 'index']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/pembayaran/{id}',[KepsekSppBayarDataController::class, 'index']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}',[KepsekSppBayarController::class, 'index']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}/detail/{id_spp_bayar}',[KepsekSppBayarDetailController::class, 'index']);
    // END ROUTE SPP LIHAT PEMBAYARAN //

    // ROUTE SPP LIHAT PEMASUKAN KANTIN //
    Route::get('/spp/tunggakan/{id}/lihat-pemasukan-kantin/{id_bulan_tahun}',[KepsekSppBulanTahunController::class, 'lihatPemasukanKantin']);
    // END ROUTE SPP LIHAT PEMASUKAN KANTIN //

    // ROUTE SPP LIHAT SPP //
    Route::get('/spp/tunggakan/{id}/lihat-spp/{id_bulan_tahun}',[KepsekSppDetailController::class, 'index']);
    // END ROUTE SPP LIHAT SPP //

    // ROUTE SPP HISTORY //
    Route::get('/spp/history-spp',[KepsekHistorySppController::class, 'index']);
    Route::get('/spp/history-spp/{id}',[KepsekHistorySppController::class, 'detail']);
    // END ROUTE SPP HISTORY //

    // ROUTE LAPORAN //
    Route::get('/laporan-kantin',[KepsekLaporanController::class, 'laporanKantinView']);
    Route::get('/laporan-kantin/lihat-data',[KepsekLaporanController::class, 'laporanKantinLihatData']);
    Route::get('/laporan-data-siswa',[KepsekLaporanController::class, 'laporanDataSiswaView']);
    Route::get('/laporan-data-siswa/lihat-data',[KepsekLaporanController::class, 'laporanDataSiswaLihatData']);
    Route::get('/laporan-tunggakan',[KepsekLaporanController::class, 'laporanTunggakanView']);
    Route::get('/laporan-tunggakan/lihat-data',[KepsekLaporanController::class, 'laporanTunggakanLihatData']);
    Route::get('/laporan-rab',[KepsekLaporanController::class, 'laporanRabView']);
    Route::get('/laporan/cetak',[KepsekLaporanController::class, 'laporanCetak']);
    Route::get('/laporan-pembukuan',[KepsekLaporanController::class, 'laporanPembukuanView']);
    Route::get('/laporan-pembukuan/lihat-data',[KepsekLaporanController::class, 'laporanPembukuanLihatData']);
    // END ROUTE LAPORAN //

    // ROUTE RAB //

    Route::get('/data-perincian-rab',[KepsekRincianPengeluaranController::class,'index']);

    Route::get('/data-perincian-rab/rincian-pengeluaran/{id}',[KepsekRincianPengeluaranDetailController::class,'index']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan/{id}',[KepsekRincianPembelanjaanController::class,'rincianPembelanjaan']);

    Route::get('/data-perincian-rab/rincian-pembelanjaan-uang-makan/{id}',[KepsekRincianPembelanjaanController::class,'rincianPembelanjaanUangMakan']);

    Route::get('/data-perincian-rab/rincian-penerimaan/{id}',[KepsekRincianPenerimaanController::class,'index']);

    Route::get('/data-perincian-rab/rincian-pengajuan/{id}',[KepsekRincianPengajuanController::class,'index']);

    Route::get('/data-perincian-rab/sapras/{id}',[KepsekSaprasController::class,'index']);
});

Route::group(['prefix' => 'ortu','middleware' => 'is.ortu'],function(){
    Route::get('/dashboard',[OrtuDashboardController::class, 'index']);
    Route::get('/dashboard/panduan-notifikasi',[OrtuDashboardController::class, 'panduanNotifikasi']);
    // Route::get('/spp/{id}',[OrtuDashboardController::class, 'spp']);
    // Route::get('/spp/{id}/detail/{id_detail}',[OrtuDashboardController::class, 'detailSpp']);

    // ROUTE SPP BULAN TAHUN //
    Route::get('/spp/tunggakan/{id}',[OrtuSppBulanTahunController::class, 'index']);
    // END ROUTE SPP BULAN TAHUN //

    // ROUTE SPP LIHAT PEMBAYARAN //
    Route::get('/spp/pembayaran/{id}',[OrtuSppBayarDataController::class, 'index']);

    Route::get('/spp/pembayaran/{id}/lihat-pembayaran/{id_spp_bayar_data}',[OrtuSppBayarController::class, 'index']);
});

Route::get('/urai-bulan-tahun',function(){
    $spp_bulan_tahun = App\Models\SppBulanTahun::all();
    foreach ($spp_bulan_tahun as $key => $value) {
        $explode_bulan_tahun = explode(',',$value->bulan_tahun);
        $update = [
            'bulan' => describe_month($explode_bulan_tahun[0]),
            'tahun' => $explode_bulan_tahun[1]
        ];
        App\Models\SppBulanTahun::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                    ->update($update);
    }
    echo 'oke';
});

Route::get('/test-telegram',[AdminSppController::class, 'testingBotTelegram']);

Route::get('/bot-tele',[AdminSppController::class, 'testChatId']);
Route::get('/set-webhook',[AdminSppController::class, 'setWebhook']);
Route::post('/bot-telegram',[AdminSppController::class, 'commandHandleWebHook']);
Route::get('/coba-event',[AdminSppController::class, 'cobaEvent']);
Route::get('/coba-tele-cron',[AdminSppController::class, 'cobaTeleCron']);