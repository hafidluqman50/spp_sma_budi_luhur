<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\SppBulanTahun;
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
        $tahun_ajaran  = $request->tahun_ajaran;
        $kelas         = $request->kelas;
        $siswa         = $request->siswa;
        $bulan_tahun   = $request->bulan_tahun;

        $kolom_spp        = $request->kolom_spp;
        $nominal_spp      = $request->nominal_spp;
        $total_pembayaran = array_sum($nominal_spp);

        // CHECK SISWA //
        if (Spp::where('id_kelas_siswa',$siswa)->count() > 0) {
            $id_spp = Spp::where('id_kelas_siswa',$siswa)->firstOrFail()->id_spp;
        }
        else {
            $id_spp = (string)Str::uuid();
            $data_spp = [
                'id_spp'           => $id_spp,
                'id_kelas_siswa'   => $siswa,
                'total_pembayaran' => $total_pembayaran
            ];
            Spp::create($data_spp);   
        }
        // END CHECK SISWA //

        $id_spp_bulan_tahun = (string)Str::uuid();
        $data_spp_bulan_tahun = [
            'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
            'id_spp'             => $id_spp,
            'bulan_tahun'        => $bulan_tahun
        ];

        SppBulanTahun::create($data_spp_bulan_tahun);

        foreach ($kolom_spp as $index => $element) {
            $id_spp_detail = (string)Str::uuid();
            $data_spp_detail = [
                'id_spp_detail'      => $id_spp_detail,
                'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
                'id_kolom_spp'       => $kolom_spp[$index],
                'nominal_spp'        => $nominal_spp[$index],
                'bayar_spp'          => 0,
                'status_bayar'       => 0
            ];

            SppDetail::create($data_spp_detail);
        }

        return redirect('/admin/spp')->with('message','Berhasil Input Data SPP');
    }

    public function delete($id)
    {
        Spp::where('id_spp',$id)->delete();

        return redirect('/admin/spp')->with('message','Berhasil Delete Data SPP');
    }
}
