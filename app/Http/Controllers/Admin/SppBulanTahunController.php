<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppBulanTahun;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title = 'SPP Bulan Tahun';

        return view('Admin.spp-bulan-tahun.main',compact('title','id'));
    }

    public function delete($id,$id_bulan_tahun)
    {
        SppBulanTahun::where('id_spp',$id)
                    ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->delete();

        return redirect('/admin/spp/bulan-tahun/'.$id)->with('message','Berhasil Hapus Data');
    }
}
