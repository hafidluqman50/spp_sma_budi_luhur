<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaranSekolah;
use App\Models\RincianPengajuan;

class RincianPengajuanController extends Controller
{
    public function index($id)
    {
        $title = 'Petugas | Rincian Pengajuan';

        return view('Petugas.rincian-pengajuan.main',compact('title','id'));
    }

    public function tambah($id)
    {
        $title   = 'Petugas | Tambah Rincian Pengajuan';
        $rincian = RincianPengeluaranSekolah::where('uraian_rab','!=','')->get();

        return view('Petugas.rincian-pengajuan.rincian-pengajuan-tambah',compact('title','rincian','id'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian     = $request->kategori_rincian;
        $rincian              = $request->rincian;
        $keterangan_pengajuan = $request->keterangan_pengajuan;
        // $volume           = $request->volume;
        // $uang_masuk       = $request->uang_masuk;
        // $uang_keluar      = $request->uang_keluar;
        // $jenis_rincian    = $request->jenis_rincian;

        foreach ($kategori_rincian as $key => $value) {
            $data_rincian_pengajuan = [
                'id_rincian_pengeluaran'         => $id,
                'kategori_rincian_pengajuan'     => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'id_rincian_pengeluaran_sekolah' => $rincian[$key],
                'keterangan_pengajuan'           => $keterangan_pengajuan[$key]
                // 'jenis_rincian_pembelanjaan'    => $jenis_rincian
            ];

            RincianPengajuan::create($data_rincian_pengajuan);
        }

        return redirect('/petugas/data-perincian-rab/rincian-pengajuan/'.$id)->with('message','Berhasil Input Data');
    }

    public function edit($id)
    {
        $title          = 'Petugas | Form Rincian Pengajuan';
        $kategori_group = RincianPengajuan::where('id_rincian_pengeluaran',$id)
                                                ->groupBy('kategori_rincian_pengajuan')
                                                ->get();
        $rincian_pengeluaran_detail = RincianPengeluaranSekolah::where('id_rincian_pengeluaran',$id)->get();
        $rincian_pengajuan = new RincianPengajuan;

        return view('Petugas.rincian-pengajuan.rincian-pengajuan-edit',compact('title','kategori_group','id','rincian_pengajuan','rincian_pengeluaran_detail'));
    }

    public function update(Request $request, $id)
    {
        $kategori_rincian     = $request->kategori_rincian;
        $rincian              = $request->rincian;
        $keterangan_pengajuan = $request->keterangan_pengajuan;
        $id_rincian_pengajuan = $request->id_rincian_pengajuan;
        // $volume           = $request->volume;
        // $uang_masuk       = $request->uang_masuk;
        // $uang_keluar      = $request->uang_keluar;
        // $jenis_rincian    = $request->jenis_rincian;

        foreach ($rincian as $key => $value) {
            if ($id_rincian_pengajuan[$key] != '') {
                $data_rincian_pengajuan = [
                    'kategori_rincian_pengajuan'    => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_detail' => $rincian[$key],
                    'keterangan_pengajuan'          => $keterangan_pengajuan[$key]
                    // 'jenis_rincian_pembelanjaan'    => $jenis_rincian
                ];

                RincianPengajuan::where('id_rincian_pengajuan',$id_rincian_pengajuan[$key])->update($data_rincian_pengajuan);
            }
            else {
                $data_rincian_pengajuan = [
                    'id_rincian_pengeluaran'        => $id,
                    'kategori_rincian_pengajuan'    => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_detail' => $rincian[$key],
                    'keterangan_pengajuan'          => $keterangan_pengajuan[$key]
                    // 'jenis_rincian_pembelanjaan'    => $jenis_rincian
                ];

                RincianPengajuan::create($data_rincian_pengajuan);
            }
        }

        return redirect('/petugas/data-perincian-rab/rincian-pengajuan/'.$id)->with('message','Berhasil Update Data');
    }

    public function delete($id,$id_rincian_pengajuan)
    {
        RincianPengajuan::where('id_rincian_pengeluaran',$id)->where('id_rincian_pengajuan',$id_rincian_pengajuan)->delete();

        return redirect('/petugas/data-perincian-rab/rincian-pengajuan/'.$id)->with('message','Berhasil Hapus Rincian Pengajuan');
    }
}
