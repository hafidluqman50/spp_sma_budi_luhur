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
use Auth;

class DatatablesController extends Controller
{
    private $level;

    function __construct()
    {
        $this->middleware(function($request,$next){
            $this->level = Auth::user()->level_user == 2 ? 'admin' : (Auth::user()->level_user == 1 ? 'kasir' : (Auth::user()->level_user == 0 ? 'orang-tua' : ''));
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
                    ->get();

        $datatables = Datatables::of($spp)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/bulan-tahun/$action->id_spp").'">
                              <button class="btn btn-info"> Detail </button>
                           </a>
                           <form action="'.url("/$this->level/spp/delete/$action->id_spp").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->editColumn('wilayah',function($edit){
            return unslug_str($edit->wilayah);
        })->editColumn('total_pembayaran',function($edit){
            return format_rupiah($edit->total_pembayaran);
        })->make(true);
        return $datatables;
    }

    public function dataSppBulanTahun($id)
    {
        $spp_bulan_tahun = SppBulanTahun::where('id_spp',$id)
                                        ->get();

        $datatables = Datatables::of($spp_bulan_tahun)->addColumn('action',function($action){
            $column = '
                        <div class="d-flex">
                            <a href="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/detail/$action->id_spp_bulan_tahun").'">
                              <button class="btn btn-info"> Detail </button>
                           </a>
                           <form action="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/delete/$action->id_spp_bulan_tahun").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            return $column;
        })->addColumn('status_pelunasan',function($add){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Belum Lunas'],
                1 => ['class'=>'badge badge-success','text'=>'Sudah Lunas']
            ];
            return '<span class="'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['class'].'">'.$array[SppBulanTahun::checkStatus($add->id_spp_bulan_tahun)]['text'].'</span>';
        })->rawColumns(['action','status_pelunasan'])->make(true);
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
            if ($action->status_bayar == 1) {
                $column = '
                        <div class="d-flex">
                           <form action="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/detail/$action->id_spp_bulan_tahun/delete/$action->id_spp_detail").'" method="POST">
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
                            <a href="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/detail/$action->id_spp_bulan_tahun/bayar/$action->id_spp_detail").'">
                              <button class="btn btn-success"> Bayar </button>
                           </a>
                           <form action="'.url("/$this->level/spp/bulan-tahun/$action->id_spp/detail/$action->id_spp_bulan_tahun/delete/$action->id_spp_detail").'" method="POST">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                           </form>
                       </div>
                    ';
            }
            return $column;
        })->editColumn('nominal_spp',function($edit){
            return format_rupiah($edit->nominal_spp);
        })->editColumn('bayar_spp',function($edit){
            return format_rupiah($edit->bayar_spp);
        })->editColumn('tanggal_bayar',function($edit){
            if ($edit->tanggal_bayar == NULL) {
                $tanggal_bayar = '-';
            }
            else {
                $tanggal_bayar = human_date($edit->tanggal_bayar);
            }
            return $tanggal_bayar;
        })->editColumn('status_bayar',function($edit){
            $array = [
                0 => ['class'=>'badge badge-danger','text'=>'Belum Bayar'],
                1 => ['class'=>'badge badge-success','text'=>'Sudah Bayar']
            ];
            return '<span class="'.$array[$edit->status_bayar]['class'].'">'.$array[$edit->status_bayar]['text'].'</span>';
        })->rawColumns(['action','status_bayar'])->make(true);
        return $datatables;
    }
}
