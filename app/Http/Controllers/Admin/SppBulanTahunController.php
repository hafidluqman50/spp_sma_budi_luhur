<?php

namespace App\Http\Controllers\Admin;

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

        return view('Admin.spp-bulan-tahun.main',compact('title','id','siswa','spp_bulan_tahun','tahun','spp_detail'));
    }

    public function edit($id,$id_bulan_tahun)
    {
        $title = 'Edit SPP Bulan Tahun';

        $kantin = Kantin::where('status_delete',0)->get();

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
                                // ->where('bayar_spp',0)
                                // ->where('status_bayar',0)
                                ->get();

        $kolom_spp = KolomSpp::where('status_delete',0)->get();

        return view('Admin.spp-bulan-tahun.spp-bulan-tahun-edit',compact('title','id','id_bulan_tahun','row','row_kolom_spp','kolom_spp','kantin'));
    }

    public function update(Request $request,$id,$id_bulan_tahun)
    {
        $kantin           = $request->kantin;
        $kolom_spp        = $request->kolom_spp;
        $nominal_spp      = $request->nominal_spp;
        $kolom_spp_hide   = $request->kolom_spp_hide;
        $nominal_spp_hide = $request->nominal_spp_hide;

        SppBulanTahun::where('id_spp_bulan_tahun',$id_bulan_tahun)->update(['id_kantin' => $kantin]);

        if (count($kolom_spp_hide) != 0) {
            foreach ($kolom_spp_hide as $key => $value) {
                $data_kolom_spp = [
                    'id_spp_bulan_tahun' => $id_bulan_tahun,
                    'id_kolom_spp'       => $kolom_spp_hide[$key],
                    'nominal_spp'        => $nominal_spp_hide[$key],
                    'bayar_spp'          => 0,
                    'sisa_bayar'         => $nominal_spp_hide[$key],
                    'status_bayar'       => 0
                ];

                SppDetail::create($data_kolom_spp);
            }

            foreach ($kolom_spp as $index => $val) {
                $data_kolom_spp = [
                    'id_spp_bulan_tahun' => $id_bulan_tahun,
                    'id_kolom_spp'       => $kolom_spp[$index],
                    'nominal_spp'        => $nominal_spp[$index],
                    'bayar_spp'          => 0,
                    'sisa_bayar'         => $nominal_spp[$index],
                    'status_bayar'       => 0
                ];

                SppDetail::where('id_spp_detail',$id_spp_detail[$index])->update($data_kolom_spp);
            }
        }
        else {


            // $get_sum_total_old   = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
            //                                   ->where('bayar_spp','=',0)
            //                                   ->sum('nominal_spp');

            // $total_harus_bayar_old = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;

            // Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar_old - $get_sum_total_old]);

            // SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->where('status_bayar',0)->delete();

            foreach ($kolom_spp as $index => $val) {
                $data_kolom_spp = [
                    'id_spp_bulan_tahun' => $id_bulan_tahun,
                    'id_kolom_spp'       => $kolom_spp[$index],
                    'nominal_spp'        => $nominal_spp[$index],
                    'bayar_spp'          => 0,
                    'sisa_bayar'         => $nominal_spp[$index],
                    'status_bayar'       => 0
                ];

                SppDetail::where('id_spp_detail',$id_spp_detail[$index])->update($data_kolom_spp);
            }
        }

        // $total_harus_bayar_new = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;
        // $get_sum_total_new     = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
        //                                 ->where('bayar_spp','=',0)
        //                                 ->sum('nominal_spp');

        // Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar_new + $get_sum_total_new]);

        return redirect('/admin/spp/tunggakan/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Edit SPP');
    }

    public function delete($id,$id_bulan_tahun)
    {

        $spp_row = SppBulanTahun::getRowById($id_bulan_tahun);
        $text_history = Auth::user()->name.' telah menghapus data SPP <b>'.$spp_row->nama_siswa.' '.$spp_row->kelas.' '.$spp_row->tahun_ajaran.'</b> Bulan Tahun : <b>'.$spp_row->bulan_tahun.'</b>';

        $history = ['text' => $text_history,'status_terbaca' => 0];
        HistoryProsesSpp::create($history);

        // $get_sum_total     = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->sum('nominal_spp');
        // $total_harus_bayar = Spp::where('id_spp',$id)->firstOrFail()->total_harus_bayar;

        // Spp::where('id_spp',$id)->update(['total_harus_bayar' => $total_harus_bayar - $get_sum_total]);

        SppBulanTahun::where('id_spp',$id)
                    ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->update(['status_delete' => 1]);

        return redirect('/admin/spp/tunggakan/'.$id)->with('message','Berhasil Hapus Data');
    }

    public function lihatPemasukanKantin($id,$id_bulan_tahun)
    {
        $title = 'Lihat Pemasukan Kantin | Admin';
        $data_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                ->where('spp_bulan_tahun.id_spp',$id)
                                ->where('spp_bulan_tahun.id_spp_bulan_tahun',$id_bulan_tahun)
                                ->firstOrFail();

        return view('Admin.pemasukan-kantin.main',compact('title','id','id_bulan_tahun','data_spp'));
    }
}
