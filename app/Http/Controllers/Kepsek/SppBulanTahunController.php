<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;
use App\Models\HistoryProsesSpp;
use App\Models\Kantin;
use Auth;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title           = 'SPP Bulan Tahun';
        $siswa           = Spp::getRowById($id);
        $spp_bulan_tahun = new SppBulanTahun;
        $spp_detail      = new SppDetail;
        $tahun           = SppBulanTahun::leftJoin('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                                        ->where('id_spp',$id)
                                        ->groupBy('tahun')
                                        ->orderBy('tahun','ASC')
                                        ->get();

        return view('Kepsek.spp-bulan-tahun.main',compact('title','id','siswa','spp_bulan_tahun','tahun','spp_detail'));
    }

    public function lihatPemasukanKantin($id,$id_bulan_tahun)
    {
        $title = 'Lihat Pemasukan Kantin | Kepsek';
        $data_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                ->where('spp_bulan_tahun.id_spp',$id)
                                ->where('spp_bulan_tahun.id_spp_bulan_tahun',$id_bulan_tahun)
                                ->firstOrFail();

        return view('Kepsek.pemasukan-kantin.main',compact('title','id','id_bulan_tahun','data_spp'));
    }
}
