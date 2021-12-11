<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title = 'SPP Bulan Tahun';
        $siswa = SppBulanTahun::getSiswa($id_bulan_tahun);

        return view('Petugas.spp-bulan-tahun.main',compact('title','id','siswa'));
    }

    public function edit($id,$id_bulan_tahun)
    {
        $title = 'Edit SPP Bulan Tahun';

        $row = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('spp.id_spp',$id)
                            ->where('spp_bulan_tahun.id_spp_bulan_tahun',$id_bulan_tahun)
                            ->firstOrFail();

        $row_kolom_spp = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                ->where('spp_detail.id_spp_bulan_tahun',$id_bulan_tahun)
                                ->where('status_bayar',0)
                                ->get();

        $kolom_spp = KolomSpp::where('status_delete',0)->get();

        return view('Petugas.spp-bulan-tahun.spp-bulan-tahun-edit',compact('title','id','id_bulan_tahun','row','row_kolom_spp','kolom_spp'));
    }

    public function update(Request $request,$id,$id_bulan_tahun)
    {
        $kolom_spp   = $request->kolom_spp;
        $nominal_spp = $request->nominal_spp;

        SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->where('status_bayar',0)->delete();

        foreach ($kolom_spp as $key => $value) {
            $data_kolom_spp = [
                'id_spp_bulan_tahun' => $id_bulan_tahun,
                'id_kolom_spp'       => $kolom_spp[$key],
                'nominal_spp'        => $nominal_spp[$key],
                'tanggal_bayar'      => null,
                'bayar_spp'          => 0,
                'status_bayar'       => 0
            ];

            SppDetail::create($data_kolom_spp);
        }

        return redirect('/petugas/spp/bulan-tahun/'.$id.'/detail/'.$id_bulan_tahun)->with('message','Berhasil Edit SPP');
    }

    public function delete($id,$id_bulan_tahun)
    {
        SppBulanTahun::where('id_spp',$id)
                    ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->delete();

        return redirect('/petugas/spp/bulan-tahun/'.$id)->with('message','Berhasil Hapus Data');
    }
}
