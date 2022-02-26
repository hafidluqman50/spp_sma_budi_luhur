<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;
use App\Models\HistoryProsesSpp;
use Auth;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title = 'SPP Bulan Tahun';
        $siswa = Spp::getRowById($id);

        return view('Admin.spp-bulan-tahun.main',compact('title','id','siswa'));
    }

    public function edit($id,$id_bulan_tahun)
    {
        $title = 'Edit SPP Bulan Tahun';

        $row = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                            ->join('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
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
                                ->where('bayar_spp',0)
                                ->where('status_bayar',0)
                                ->get();

        $kolom_spp = KolomSpp::where('status_delete',0)->get();

        return view('Admin.spp-bulan-tahun.spp-bulan-tahun-edit',compact('title','id','id_bulan_tahun','row','row_kolom_spp','kolom_spp'));
    }

    public function update(Request $request,$id,$id_bulan_tahun)
    {
        $kolom_spp   = $request->kolom_spp;
        $nominal_spp = $request->nominal_spp;

        $get_sum_total_old   = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                                          ->where('bayar_spp','=',0)
                                          ->sum('nominal_spp');

        $total_harus_bayar_old = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;

        Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar_old - $get_sum_total_old]);

        SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->where('status_bayar',0)->delete();

        foreach ($kolom_spp as $key => $value) {
            $data_kolom_spp = [
                'id_spp_bulan_tahun' => $id_bulan_tahun,
                'id_kolom_spp'       => $kolom_spp[$key],
                'nominal_spp'        => $nominal_spp[$key],
                'bayar_spp'          => 0,
                'sisa_bayar'         => $nominal_spp[$key],
                'status_bayar'       => 0
            ];

            SppDetail::create($data_kolom_spp);
        }

        $total_harus_bayar_new = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;
        $get_sum_total_new     = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                                        ->where('bayar_spp','=',0)
                                        ->sum('nominal_spp');

        Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar_new + $get_sum_total_new]);

        return redirect('/admin/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Edit SPP');
    }

    public function delete($id,$id_bulan_tahun)
    {

        $spp_row = SppBulanTahun::getRowById($id_bulan_tahun);
        $text_history = Auth::user()->name.' telah menghapus data SPP <b>'.$spp_row->nama_siswa.' '.$spp_row->kelas.' '.$spp_row->tahun_ajaran.'</b> Bulan Tahun : <b>'.$spp_row->bulan_tahun.'</b>';

        $history = ['text' => $text_history,'status_terbaca' => 0];
        HistoryProsesSpp::create($history);

        $get_sum_total     = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->sum('nominal_spp');
        $total_harus_bayar = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;

        Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar - $get_sum_total]);

        SppBulanTahun::where('id_spp',$id)
                    ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->delete();

        return redirect('/admin/spp/bulan-tahun/'.$id)->with('message','Berhasil Hapus Data');
    }
}
