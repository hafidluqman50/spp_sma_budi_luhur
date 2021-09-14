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
}
