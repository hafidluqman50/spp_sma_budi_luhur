<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPengeluaranDetailController extends Controller
{
    public function index($id)
    {
        $title = 'Admin | Rincian Pengeluaran Detail';

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-detail',compact('title','id'));
    }

    public function delete($id,$id_detail)
    {
        RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)
                                ->where('id_rincian_pengeluaran_detail',$id_detail)
                                ->delete();

        return redirect('/admin/data-perincian-rab/detail/'.$id)->with('message','Berhasil Hapus Data');
    }
}
