<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppDetail;

class SppDetailController extends Controller
{
    public function index($id,$id_bulan_tahun)
    {
        $title = 'SPP Detail | Admin';

        return view('Admin.spp-detail.main',compact('title','id','id_bulan_tahun'));
    }

    public function formBayar($id,$id_bulan_tahun,$id_detail)
    {
        $title = 'Form Bayar | Admin';
        $spp   = SppDetail::getBayarById($id_detail);

        return view('Admin.spp-detail.spp-detail-bayar',compact('title','id','id_bulan_tahun','id_detail','spp'));
    }

    public function bayar(Request $request,$id,$id_bulan_tahun,$id_detail)
    {
        $bayar_spp = $request->bayar_spp;

        $spp_detail = SppDetail::where('id_spp_detail',$id_detail)->firstOrFail();

        if ($bayar_spp >= $spp_detail->nominal_spp) {
            $status_bayar = 1;
        }
        else {
            $status_bayar = 0;
        }

        $data_spp_detail = [
            'tanggal_bayar' => date('Y-m-d'),
            'bayar_spp'     => $bayar_spp,
            'status_bayar'  => $status_bayar
        ];

        SppDetail::where('id_spp_detail',$id_detail)
                ->update($data_spp_detail);

        return redirect('/admin/spp/bulan-tahun/'.$id.'/detail/'.$id_bulan_tahun)->with('message','Berhasil Bayar SPP');
    }

    public function formBayarSemua($id,$id_bulan_tahun)
    {
        $title = 'Form Bayar Semua | Admin';

        return view('Admin.spp-detail.spp-detail-bayar-semua',compact('title','id','id_bulan_tahun'));
    }

    public function delete($id,$id_bulan_tahun,$id_detail)
    {
        SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->where('id_spp_detail',$id_detail)
                    ->delete();

        return redirect('/admin/spp/bulan-tahun/'.$id.'/detail/'.$id_bulan_tahun)->with('message','Berhasil Hapus Data');
    }
}
