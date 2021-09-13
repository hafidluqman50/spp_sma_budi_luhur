<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
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
                        <a href="'.url("/$this->level/siswa/edit/$action->id_siswa").'">
                          <button class="btn btn-warning"> Edit </button>
                       </a>
                       <form action="'.url("/$this->level/siswa/delete/$action->id_siswa").'" method="POST">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                       </form>
                    ';
            return $column;
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
                        <a href="'.url("/$this->level/kelas/edit/$action->id_kelas").'">
                          <button class="btn btn-warning"> Edit </button>
                       </a>
                       <form action="'.url("/$this->level/kelas/delete/$action->id_kelas").'" method="POST">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                       </form>
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
                        <a href="'.url("/$this->level/tahun-ajaran/edit/$action->id_tahun_ajaran").'">
                          <button class="btn btn-warning"> Edit </button>
                       </a>
                       <form action="'.url("/$this->level/tahun-ajaran/delete/$action->id_tahun_ajaran").'" method="POST">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm(\'Delete ?\');"> Delete </button>
                       </form>
                    ';
            return $column;
        })->make(true);
        return $datatables;
    }
}
