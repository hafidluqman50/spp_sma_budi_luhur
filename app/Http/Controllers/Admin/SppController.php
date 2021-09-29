<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\SppDetail;
use App\Models\KelasSiswa;

class SppController extends Controller
{
    public function index()
    {
        $title = 'SPP | Admin';

        return view('Admin.spp.main',compact('title'));
    }

    public function tambah()
    {
        $title        = 'Tambah SPP | Admin';
        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();

        return view('Admin.spp.spp-tambah',compact('title','tahun_ajaran','kolom_spp','kelas'));
    }

    public function save(Request $request)
    {
        // $tanggal_spp = date('Y-m-d');
        // $siswa       = $request->siswa;
        // $kolom_spp   = $request->kolom_spp;
        // $bayar_spp   = $request->nominal_bayar;

        // $data_spp = [
        //     'id_spp'           => $id_spp,
        //     'id_kelas_siswa'   => $siswa,
        //     'total_pembayaran' => 0,
        // ];

        // Spp::create($data_spp);

        // $sum_total_bayar = 0;

        // foreach ($kolom_spp as $key => $value) {
        //     $id_spp_detail = (string)Str::uuid();
        //     $data_spp_detail[] = [
        //         'id_spp_detail' => $id_spp_detail,
        //         'id_spp'        => $id_spp,
        //         'tanggal_bayar' => $tanggal_spp,
        //         'id_kolom_spp'  => $kolom_spp[$key],
        //         'bayar_spp'     => $bayar_spp[$key]
        //     ];
        //     $sum_total_bayar = $sum_total_bayar+$bayar_spp[$key];
        // }

        // SppDetail::insert($data_spp_detail);
        // Spp::where('id_spp',$id_spp)->update(['total_pembayaran' => $sum_total_bayar]);
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas        = $request->kelas;
        $kolom_spp    = $request->kolom_spp;

        $get_siswa = KelasSiswa::where('id_tahun_ajaran',$tahun_ajaran)
                                ->where('id_kelas',$kelas)
                                ->get();

        foreach ($get_siswa as $key => $value) {
            $id_spp = (string)Str::uuid();
            $data_spp = [
                'id_spp'           => $id_spp,
                'id_kelas_siswa'   => $value->id_kelas_siswa,
                'total_pembayaran' => 0
            ];
            Spp::create($data_spp);

            foreach ($kolom_spp as $index => $element) {
                $id_spp_detail = (string)Str::uuid();
                $data_spp_detail = [
                    'id_spp_detail' => $id_spp_detail,
                    'id_spp'        => $id_spp,
                    'id_kolom_spp'  => $element,
                    'bayar_spp'     => 0,
                    'status_bayar'  => 0
                ];

                SppDetail::create($data_spp_detail);
            }
        }

        return redirect('/admin/spp')->with('message','Berhasil Input Data SPP');
    }

    public function delete($id)
    {
        Spp::where('id_spp',$id)->delete();

        return redirect('/admin/spp')->with('message','Berhasil Delete Data SPP');
    }
}
