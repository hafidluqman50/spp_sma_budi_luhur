<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use App\Models\Kantin;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\Petugas;
use App\Models\Kepsek;
use App\Models\HistoryProsesSpp;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
use App\Models\RincianPembelanjaan;
use App\Models\RincianPenerimaan;
use Auth;

class DatatablesController extends Controller
{
    private $level;

    function __construct()
    {
        $this->middleware(function($request,$next){
            $this->level = Auth::user()->level_user == 3 ? 'admin' : (Auth::user()->level_user == 2 ? 'petugas' : (Auth::user()->level_user == 1 ? 'kepsek' : (Auth::user()->level_user == 0 ? 'ortu' : '')));
            return $next($request);
        });
    }

    public function dataSiswa()
    {
        $siswa = Siswa::where('status_delete',0)->get();
        $datatables = Datatables::of($siswa)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/siswa/edit/$action->id_siswa").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/siswa/delete/$action->id_siswa").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->editColumn('jenis_kelamin',function($edit){
            if ($edit->jenis_kelamin == 'laki-laki') {
                $jenis_kelamin = 'Laki - Laki';
            }
            else {
                $jenis_kelamin = 'Perempuan';
            }

            return $jenis_kelamin;
        })->editColumn('tanggal_lahir',function($edit){
            return human_date($edit->tanggal_lahir);
        })->editColumn('wilayah',function($edit){
            return unslug_str($edit->wilayah);
        })->make(true);
        return $datatables;
    }

    public function dataKelas()
    {
        $kelas = Kelas::where('status_delete',0)->get();
        $datatables = Datatables::of($kelas)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/kelas/edit/$action->id_kelas").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <a href="'.url("/$this->level/kelas/siswa/$action->id_kelas").'">
                              <button class="btn btn-info"> Lihat Siswa </button>
                           </a>
                           <form action="'.url("/$this->level/kelas/delete/$action->id_kelas").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->make(true);
        return $datatables;
    }

    public function dataTahunAjaran()
    {
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $datatables = Datatables::of($tahun_ajaran)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/tahun-ajaran/edit/$action->id_tahun_ajaran").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/tahun-ajaran/delete/$action->id_tahun_ajaran").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->make(true);
        return $datatables;
    }

    public function dataKelasSiswa($id)
    {
        $kelas_siswa = KelasSiswa::getData($id);
        $datatables = Datatables::of($kelas_siswa)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/kelas/siswa/$action->id_kelas/edit/$action->id_kelas_siswa").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/kelas/siswa/$action->id_kelas/delete/$action->id_kelas_siswa").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->make(true);
        return $datatables;
    }

    public function dataKantin()
    {
        $kantin = Kantin::where('status_delete',0)->get();
        $datatables = Datatables::of($kantin)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/kantin/edit/$action->id_kantin").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/kantin/delete/$action->id_kantin").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->editColumn('biaya_perbulan',function($edit){
            return format_rupiah($edit->biaya_perbulan);
        })->make(true);
        return $datatables;
    }

    public function dataKolomSpp()
    {
        $kolom_spp = KolomSpp::where('status_delete',0)->get();
        $datatables = Datatables::of($kolom_spp)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/kolom-spp/edit/$action->id_kolom_spp").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/kolom-spp/delete/$action->id_kolom_spp").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->make(true);
        return $datatables;
    }

    public function dataSpp()
    {
        $spp = Spp::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->join('users','spp.id_users','=','users.id_users')
                    ->get();

        $datatables = Datatables::of($spp)->addColumn('action',function($action){
            if ($this->level == 'kepsek') {
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp").'">
                              <button class="btn btn-success"> Pembayaran </button>
                           </a>
                       </div>
                    ';
            }
            else {
            $column = '
                        <div>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp").'">
                              <button class="btn btn-success"> Pembayaran </button>
                           </a>
                            <a href="'.url("/$this->level/spp/tunggakan/$action->id_spp").'">
                              <button class="btn btn-warning"> Tunggakan </button>
                           </a>
                           <form action="'.url("/$this->level/spp/delete/$action->id_spp").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            }
            return $column;
        })->editColumn('wilayah',function($edit){
            return unslug_str($edit->wilayah);
        })->editColumn('total_harus_bayar',function($edit){
            $sum = SppDetail::join('spp_bulan_tahun','spp_bulan_tahun.id_spp_bulan_tahun','=','spp_detail.id_spp_bulan_tahun')
                            ->where('id_spp',$edit->id_spp)
                            ->sum('sisa_bayar');

            return format_rupiah($sum);
        })->make(true);
        return $datatables;
    }

    public function dataSppBulanTahun($id)
    {
        $spp_bulan_tahun = SppBulanTahun::selectRaw("*,SUBSTRING(bulan_tahun,-4) AS tahun_numeric,SUBSTRING_INDEX(bulan_tahun, ', ', 1) as bulan_numeric")
                                        ->leftJoin('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                                        ->where('id_spp',$id)
                                        ->orderByRaw("CAST('tahun' as signed) ASC, FIELD('',`bulan_numeric`,'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') ASC")
                                        // ->orderBy('tahun_numeric','ASC')
                                        ->get();

        $datatables = Datatables::of($spp_bulan_tahun)->addColumn('action',function($action){
            if ($this->level == 'kepsek') {
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat SPP </button>
                           </a>
                       </div>
                    ';
            }
            else {

            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/tunggakan/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat SPP </button>
                           </a>
                            <a href="'.url("/$this->level/spp/tunggakan/$action->id_spp/edit/$action->id_spp_bulan_tahun").'" style="margin-right:1%;">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/$this->level/spp/tunggakan/$action->id_spp/delete/$action->id_spp_bulan_tahun").'" method="POST" style="margin-right:1%;">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            }
            return $column;
        })->editColumn('nama_kantin',function($edit){
            if ($edit->nama_kantin == NULL || $edit->nama_kantin == '') {
                $nama_kantin = '-';
            }
            else {
                $nama_kantin = $edit->nama_kantin;
            }
            
            return $nama_kantin;
        })->addColumn('total_kalkulasi',function($add){
            $kalkulasi = SppDetail::where('id_spp_bulan_tahun',$add->id_spp_bulan_tahun)->sum('sisa_bayar');

            return format_rupiah($kalkulasi);
        })->addColumn('status_pelunasan',function($add){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
            ];
            return '<span class="'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['class'].'">'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['text'].'</span>';
        })->rawColumns(['action','status_pelunasan'])->make(true);
        return $datatables;
    }

    public function dataSppBayarData($id)
    {
        $spp_bayar = SppBayarData::join('users','spp_bayar_data.id_users','=','users.id_users')
                            ->where('spp_bayar_data.id_spp',$id)->get();

        $datatables = Datatables::of($spp_bayar)->addColumn('action',function($action){
            if ($this->level == 'kepsek') {
                $column = '<div>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat Bulan Bayar </button>
                           </a>
                       </div>';
            }
            else {
                $column = '<div style="display:flex; flex-direction:column;">
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat Bulan Bayar </button>
                           </a>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/cetak-struk/$action->id_spp_bayar_data").'" style="margin-right:1%;">
                              <button class="btn btn-success"> Cetak Struk </button>
                           </a>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/retur-bayar/$action->id_spp_bayar_data").'" style="margin-right:1%;" onclick="return confirm(\'Yakin Retur Bayar ?\');">
                              <button class="btn btn-warning"> Retur Bayar </button>
                           </a>
                           <form action="'.url("/$this->level/spp/pembayaran/$action->id_spp/delete/$action->id_spp_bayar_data").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>';
            }
            return $column;
        })->editColumn('total_biaya',function($edit){
            return format_rupiah($edit->total_biaya);
        })->editColumn('nominal_bayar',function($edit){
            return format_rupiah($edit->nominal_bayar);
        })->editColumn('kembalian',function($edit){
            return format_rupiah($edit->kembalian);
        })->editColumn('tanggal_bayar',function($edit){
            return human_date($edit->tanggal_bayar);
        })->make(true);
        return $datatables;
    }

    public function dataSppBayar($id)
    {
        $spp_bayar = SppBayar::selectRaw("*,SUBSTRING(bulan_tahun,-4) AS tahun_numeric,SUBSTRING_INDEX(bulan_tahun, ', ', 1) as bulan_numeric")->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                            ->where('spp_bayar.id_spp_bayar_data',$id)
                            ->orderByRaw("FIELD(bulan_numeric,'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') ASC")
                            ->orderBy('tahun_numeric','ASC')->get();

        $datatables = Datatables::of($spp_bayar)->addColumn('action',function($action){
            if ($this->level == 'kepsek') {
                $column = '<div>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data/detail/$action->id_spp_bayar").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat Detail Bayar </button>
                           </a>
                       </div>';
            }
            else {
                $column = '<div>
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data/detail/$action->id_spp_bayar").'" style="margin-right:1%;">
                              <button class="btn btn-info"> Lihat Detail Bayar </button>
                           </a>
                       </div>';
            }
            return $column;
        })->addColumn('total_biaya',function($edit){
            $sum = SppBayarDetail::where('id_spp_bayar',$edit->id_spp_bayar)
                                 ->sum('nominal_bayar');

            return format_rupiah($sum);
        })->make(true);
        return $datatables;
    }

    public function dataSppBayarDetail($id)
    {
        $spp_bayar_detail = SppBayarDetail::join('spp_bayar','spp_bayar_detail.id_spp_bayar','=','spp_bayar.id_spp_bayar')
                            ->join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                            ->join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                            ->join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                            ->where('spp_bayar_detail.id_spp_bayar',$id)
                            ->get(['spp.id_spp','spp_bayar_detail.nominal_bayar','kolom_spp.nama_kolom_spp','spp_bayar_detail.tanggal_bayar','spp_bayar_data.id_spp_bayar_data','id_spp_bayar_detail']);

        $datatables = Datatables::of($spp_bayar_detail)->addColumn('action',function($action){
            $column = '<div class="d-flex">
                       <form action="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data/detail/$action->id_spp_bayar/delete/$action->id_spp_bayar_detail").'" method="POST">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                       </form>
                   </div>';
            return $column;
        })->editColumn('nominal_bayar',function($edit){
            return format_rupiah($edit->nominal_bayar);
        })->editColumn('tanggal_bayar',function($edit){
            return human_date($edit->tanggal_bayar);
        })->make(true);
        return $datatables;
    }

    public function dataSppDetail($id)
    {
        $spp_detail = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                ->where('spp_detail.id_spp_bulan_tahun',$id)
                                ->get();

        $datatables = Datatables::of($spp_detail)->addColumn('action',function($action){
            // if ($this->level == 'admin') {
                if ($action->status_bayar == 1) {
                    $column = '
                            <div class="d-flex">
                               <form action="'.url("/$this->level/spp/tunggakan/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun/delete/$action->id_spp_detail").'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                               </form>
                           </div>
                        ';
                }
                else {
                    $column = '
                            <div class="d-flex">
                                <a href="'.url("/$this->level/spp/tunggakan/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun/bayar/$action->id_spp_detail").'">
                                  <button class="btn btn-success"> Bayar </button>
                               </a>
                               <form action="'.url("/$this->level/spp/tunggakan/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun/delete/$action->id_spp_detail").'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                               </form>
                           </div>
                        ';
                }
            // }
            // else if ($this->level == 'petugas') {
            //     if ($action->status_bayar == 1) {
            //         $column = ' ';
            //     }
            //     else {
            //         $column = '
            //                 <div class="d-flex">
            //                    <form action="'.url("/$this->level/spp/tunggakan/$action->id_spp/lihat-spp/$action->id_spp_bulan_tahun/delete/$action->id_spp_detail").'" method="POST">
            //                         <input type="hidden" name="_token" value="'.csrf_token().'">
            //                         <input type="hidden" name="_method" value="DELETE">
            //                         <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
            //                    </form>
            //                </div>
            //             ';
            //     }
            // }
            return $column;
        })->editColumn('nominal_spp',function($edit){
            return format_rupiah($edit->nominal_spp);
        })->editColumn('bayar_spp',function($edit){
            return format_rupiah($edit->bayar_spp);
        })->addColumn('sisa_bayar',function($edit){
            return format_rupiah($edit->sisa_bayar);
        })->editColumn('status_bayar',function($edit){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
            ];
            return '<span class="'.$array[$edit->status_bayar]['class'].'">'.$array[$edit->status_bayar]['text'].'</span>';
        })->rawColumns(['action','status_bayar'])->make(true);
        return $datatables;
    }

    public function dataSiswaOrtu()
    {
        $siswa = KelasSiswa::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('nisn',auth()->user()->username)
                            ->get();

        $datatables = Datatables::of($siswa)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/$action->id_kelas_siswa").'">
                              <button class="btn btn-info"> Lihat SPP </button>
                           </a>
                       </div>
                    ';
            return $column;
        })->editColumn('wilayah',function($edit){
            return unslug_str($edit->wilayah);
        })->make(true);

        return $datatables;
    }

    public function dataSppOrtu($id)
    {
        $spp_bulan_tahun = SppBulanTahun::join('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')->where('id_kelas_siswa',$id)
                                        ->get();

        $datatables = Datatables::of($spp_bulan_tahun)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/$action->id_kelas_siswa/detail/$action->id_spp_bulan_tahun").'">
                              <button class="btn btn-info"> Detail </button>
                           </a>
                       </div>
                    ';
            return $column;
        })->addColumn('total_kalkulasi',function($add){
            $kalkulasi = SppDetail::where('id_spp_bulan_tahun',$add->id_spp_bulan_tahun)->sum('sisa_bayar');

            return format_rupiah($kalkulasi);
        })->addColumn('status_pelunasan',function($add){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
            ];
            return '<span class="'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['class'].'">'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['text'].'</span>';
        })->rawColumns(['action','status_pelunasan'])->make(true);
        return $datatables;
    }

    public function dataSppOrtuDetail($id)
    {
        $spp_bayar = SppBayar::where('id_spp_bulan_tahun',$id)->get();

        $datatables = Datatables::of($spp_bayar)->editColumn('total_biaya',function($edit){
            return format_rupiah($edit->total_biaya);
        })->addColumn('total_kalkulasi',function($add){
            $kalkulasi = 0;
            $get_spp_detail = SppDetail::where('id_spp_bulan_tahun',$add->id_spp_bulan_tahun)->get();
            foreach ($get_spp_detail as $key => $value) {
                $kalkulasi = $kalkulasi + ($value->nominal_spp - $value->bayar_spp);
            }

            return format_rupiah($kalkulasi);
        })->editColumn('nominal_bayar',function($edit){
            return format_rupiah($edit->nominal_bayar);
        })->editColumn('kembalian',function($edit){
            return format_rupiah($edit->kembalian);
        })->editColumn('tanggal_bayar',function($edit){
            return human_date($edit->tanggal_bayar);
        })->make(true);
        return $datatables;
    }

    public function dataPetugas()
    {
        $petugas    = Petugas::showData();
        $datatables = Datatables::of($petugas)->addColumn('action',function($action){
            $array = [
                0 => ['class'=>'btn-success','text'=>'Aktifkan'],
                1 => ['class'=>'btn-danger','text'=>'Nonaktifkan']
            ];
            $column = '<a href="'.url("/admin/data-petugas/edit/$action->id_petugas").'">
                          <button class="btn btn-warning"> Edit </button>
                       </a>
                       <a href="'.url("/admin/data-petugas/delete/$action->id_petugas").'">
                           <button class="btn btn-danger" onclick="return confirm(\'Yakin Hapus ?\');"> Hapus </button>
                       </a>
                       <a href="'.url("/admin/data-petugas/status-petugas/$action->id_petugas").'">
                            <button class="btn '.$array[$action->status_akun]['class'].'">'.$array[$action->status_akun]['text'].'</button>
                       </a>
                    ';
            return $column;
        })->editColumn('jabatan_petugas',function($edit){
            return unslug_str($edit->jabatan_petugas);
        })->editColumn('status_akun',function($status){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Non Aktif'],
                1 => ['class'=>'badge badge-success','text'=>'Aktif']
            ];
            return '<span class="'.$array[$status->status_akun]['class'].'">'.$array[$status->status_akun]['text'].'</span>';
        })->rawColumns(['status_akun','action'])->make(true);
        return $datatables;
    }

    public function dataKepsek()
    {
        $kepsek     = Kepsek::showData();
        $datatables = Datatables::of($kepsek)->addColumn('action',function($action){
            $array = [
                0 => ['class'=>'btn-success','text'=>'Aktifkan'],
                1 => ['class'=>'btn-danger','text'=>'Nonaktifkan']
            ];
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/admin/data-kepsek/edit/$action->id_kepsek").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                           <form action="'.url("/admin/data-kepsek/delete/$action->id_kepsek").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                           <a href="'.url("/admin/data-kepsek/status-kepsek/$action->id_kepsek").'">
                                <button class="btn '.$array[$action->status_akun]['class'].'">'.$array[$action->status_akun]['text'].'</button>
                           </a>
                       </div>
                    ';
            return $column;
        })->editColumn('status_akun',function($status){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Non Aktif'],
                1 => ['class'=>'badge badge-success','text'=>'Aktif']
            ];
            return '<span class="'.$array[$status->status_akun]['class'].'">'.$array[$status->status_akun]['text'].'</span>';
        })->rawColumns(['status_akun','action'])->make(true);
        return $datatables;
    }

    public function dataHistorySpp()
    {
        $history_proses_spp = HistoryProsesSpp::all();
        $datatables = Datatables::of($history_proses_spp)->addColumn('action',function($action){
            $column = '<a href="'.url("/$this->level/spp/history-spp/$action->id_history_proses_spp").'">
                          <button class="btn btn-info"> Detail </button>
                       </a>
                    ';
            return $column;
        })->editColumn('text',function($edit){
            return Str::limit($edit->text,70);
        })->editColumn('created_at',function($edit){
            $explode = explode(' ',$edit->created_at);
            return human_date($explode[0]).' '.$explode[1];
        })->rawColumns(['text','action'])->make(true);
        return $datatables;
    }

    public function laporanKantin()
    {
        $kantin = Kantin::get();
        $datatables = Datatables::of($kantin)->addColumn('action',function($action){
            $column = '<div class="d-flex">
                            <button class="btn btn-success" name="btn_cetak" value="laporan-kantin" id-kantin="'.$action->nama_kantin.'"> Cetak Laporan </button>
                            <button class="btn btn-info info-kantin" type="button" id-kantin="'.$action->id_kantin.'"> Lihat Laporan </button>
                       </div>';
            return $column;
        })->make(true);
        return $datatables;
    }

    public function transaksiTerakhir()
    {
        $transaksi_terakhir = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                    ->join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                    ->join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                    // ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                    // ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                    ->orderBy('tanggal_bayar','DESC')
                                    ->get();

        $datatables = Datatables::of($transaksi_terakhir)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/pembayaran/$action->id_spp/lihat-pembayaran/$action->id_spp_bayar_data/detail/$action->id_spp_bayar").'">
                              <button class="btn btn-primary waves-light"> Lihat </button>
                           </a>
                       </div>
                    ';
            return $column;
        })->editColumn('wilayah',function($edit){
            return unslug_str($edit->wilayah);
        })->editColumn('tanggal_bayar',function($edit){
            return human_date($edit->tanggal_bayar);
        })->addColumn('nominal_bayar_bulan_tahun',function($edit){
            $sum = SppBayarDetail::where('id_spp_bayar',$edit->id_spp_bayar)
                                ->sum('nominal_bayar');
            return format_rupiah($sum);
        })->make(true);

        return $datatables;
    }

    public function dataRincianPengeluaran()
    {
        $rincian_pengeluaran = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->get();

        $datatables = Datatables::of($rincian_pengeluaran)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex" style="flex-direction:column;">
                            <a href="'.url("/$this->level/data-perincian-rab/detail/$action->id_rincian_pengeluaran").'">
                              <button class="btn btn-primary waves-light"> Detail Rincian </button>
                           </a>
                            <a href="'.url("/$this->level/data-perincian-rab/rincian-pembelanjaan/$action->id_rincian_pengeluaran").'">
                              <button class="btn btn-success waves-light"> Rincian Pembelanjaan </button>
                           </a>
                            <a href="'.url("/$this->level/data-perincian-rab/rincian-pembelanjaan-uang-makan/$action->id_rincian_pengeluaran").'">
                              <button class="btn btn-success waves-light"> Rincian Pembelanjaan Uang Makan </button>
                           </a>
                            <a href="'.url("/$this->level/data-perincian-rab/rincian-penerimaan/$action->id_rincian_pengeluaran").'">
                              <button class="btn btn-success waves-light"> Rincian Penerimaan </button>
                           </a>
                            <a href="'.url("/$this->level/data-perincian-rab/edit/$action->id_rincian_pengeluaran").'">
                              <button class="btn btn-warning"> Edit </button>
                           </a>
                            <a href="'.url("/$this->level/laporan/cetak?id_rincian_pengeluaran=$action->id_rincian_pengeluaran&btn_cetak=laporan-rab").'">
                              <button class="btn btn-default"> Cetak <span class="fa fa-file-excel-o"></span></button>
                           </a>
                           <form action="'.url("/$this->level/data-perincian-rab/delete/$action->id_rincian_pengeluaran").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->addColumn('bulan_tahun_laporan',function($add){
            return month($add->bulan_laporan).', '.$add->tahun_laporan;
        })->addColumn('bulan_tahun_pengajuan',function($add){
            return month($add->bulan_pengajuan).', '.$add->tahun_pengajuan;
        })->editColumn('saldo_awal',function($edit){
            return format_rupiah($edit->saldo_awal);
        })->make(true);

        return $datatables;
    }

    public function dataRincianPengeluaranDetail($id)
    {
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::leftJoin('kolom_spp','rincian_pengeluaran_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')->where('id_rincian_pengeluaran',$id)->get();

        $datatables = Datatables::of($rincian_pengeluaran_detail)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                           <form action="'.url("/$this->level/data-perincian-rab/detail/$action->id_rincian_pengeluaran/delete/$action->id_rincian_pengeluaran_detail").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->editColumn('tanggal_rincian',function($add){
            return human_date($add->tanggal_rincian);
        })->addColumn('total_nominal_uraian',function($add){
            return format_rupiah($add->volume_rincian * $add->nominal_rincian);
        })->addColumn('total_nominal_rab',function($add){
            return format_rupiah($add->volume_rab * $add->nominal_rab);
        })->editColumn('nominal_rincian',function($add){
            return format_rupiah($add->nominal_rincian);
        })->editColumn('nominal_pendapatan_spp',function($add){
            return format_rupiah($add->nominal_pendapatan_spp);
        })->editColumn('nominal_rab',function($add){
            return format_rupiah($add->nominal_rab);
        })->make(true);

        return $datatables;
    }

    public function dataRincianPembelanjaan($id,$ket)
    {
        $rincian_pembelanjaan = RincianPembelanjaan::join('rincian_pengeluaran_detail','rincian_pembelanjaan.id_rincian_pengeluaran_detail','=','rincian_pengeluaran_detail.id_rincian_pengeluaran_detail')
            ->where('rincian_pembelanjaan.id_rincian_pengeluaran',$id)
            ->where('jenis_rincian_pembelanjaan',$ket)
            ->get();

        $datatables = Datatables::of($rincian_pembelanjaan)->addColumn('action',function($action){
                $column = ' <div class="d-flex">
                               <form action="'.url("/$this->level/data-perincian-rab/detail/$action->id_rincian_pengeluaran/delete/$action->id_rincian_pengeluaran_detail").'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                               </form>
                           </div>
                        ';
                return $column;
            })->editColumn('nominal_rincian',function($edit){
                return format_rupiah($edit->nominal_rincian);
            })->editColumn('nominal_pendapatan_spp',function($edit){
                return format_rupiah($edit->nominal_pendapatan_spp);
            })->make(true);

        return $datatables;
    }

    public function dataRincianPenerimaan($id)
    {
        $rincian_penerimaan = RincianPenerimaan::where('id_rincian_pengeluaran',$id)->get();
    }
}
