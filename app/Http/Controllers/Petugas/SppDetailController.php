<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayar;
use App\Models\Petugas;

class SppDetailController extends Controller
{
    public function index($id,$id_bulan_tahun)
    {
        $title = 'SPP Detail | Petugas';
        $siswa = SppDetail::getSiswa($id_bulan_tahun);

        return view('Petugas.spp-detail.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function formBayar($id,$id_bulan_tahun,$id_detail)
    {
        $title = 'Form Bayar | Petugas';
        $spp   = SppDetail::getBayarById($id_detail);

        return view('Petugas.spp-detail.spp-detail-bayar',compact('title','id','id_bulan_tahun','id_detail','spp'));
    }

    public function bayar(Request $request,$id,$id_bulan_tahun,$id_detail)
    {
        $tanggal_bayar = date('Y-m-d');
        $bayar_spp     = $request->bayar_spp;
        $total_biaya   = $request->total_biaya;
        $bayar_total   = $request->bayar_total;
        $kembalian     = $request->kembalian;
        $keterangan    = $request->keterangan_spp;

        $spp_detail = SppDetail::where('id_spp_detail',$id_detail)->firstOrFail();

        if ($bayar_spp > $spp_detail->sisa_bayar) {
            $status_bayar = 1;
            $bayar_spp = $spp_detail->sisa_bayar;
        }
        else if ($bayar_spp == $spp_detail->sisa_bayar) {
            $status_bayar = 1;
        }
        else {
            $status_bayar = 0;
        }

        $data_spp_detail = [
            'bayar_spp'    => $spp_detail->bayar_spp + $bayar_spp,
            'sisa_bayar'   => $spp_detail->sisa_bayar - $bayar_spp,
            'status_bayar' => $status_bayar
        ];

        $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                    ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                    ->firstOrFail()->id_spp;

        $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

        $total_harus_bayar = $get_total_harus_bayar - $bayar_spp;

        SppDetail::where('id_spp_detail',$id_detail)
                ->update($data_spp_detail);

        $data_spp_bayar = [
            'id_spp_bulan_tahun' => $id_bulan_tahun,
            'tanggal_bayar'      => $tanggal_bayar,
            'total_biaya'        => $total_biaya,
            'nominal_bayar'      => $bayar_total,
            'kembalian'          => $kembalian,
            'keterangan_bayar'   => $keterangan
        ];
        SppBayar::create($data_spp_bayar);

        Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
        $spp_detail_row = SppDetail::getBayarById($id_detail);

        $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

        // return redirect('/petugas/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Bayar SPP');
        return view('Petugas.spp-detail.struk',compact('total_biaya','spp_detail_row','tanggal_bayar','id','id_bulan_tahun','petugas'));
    }

    public function formBayarSemua($id,$id_bulan_tahun)
    {
        $title = 'Form Bayar Semua | Petugas';
        $spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                            ->firstOrFail();

        $spp_bayar = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                ->where('id_spp_bulan_tahun',$id_bulan_tahun)
                                ->get();

        $total_semua = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)->sum('nominal_spp');

        return view('Petugas.spp-detail.spp-detail-bayar-semua',compact('title','id','id_bulan_tahun','total_semua','spp','spp_bayar'));
    }

    public function bayarSemua(Request $request,$id,$id_bulan_tahun)
    {
        $tanggal_bayar = date('Y-m-d');
        $id_detail     = $request->id_detail;
        $bayar_spp     = $request->bayar_spp;
        $total_biaya   = $request->total_biaya;
        $bayar_total   = $request->bayar_total;
        $kembalian     = $request->kembalian;
        $keterangan    = $request->keterangan_spp;

        foreach ($bayar_spp as $key => $value) {
            $spp_detail = SppDetail::where('id_spp_detail',$id_detail[$key])->firstOrFail();

            if ($bayar_spp[$key] > $spp_detail->sisa_bayar) {
                $status_bayar = 1;
                $bayar_spp[$key] = $spp_detail->sisa_bayar;
            }
            else if ($bayar_spp[$key] == $spp_detail->sisa_bayar) {
                $status_bayar = 1;
            }
            else {
                $status_bayar = 0;
            }

            $data_spp_detail = [
                'bayar_spp'    => $spp_detail->bayar_spp + $bayar_spp[$key],
                'sisa_bayar'   => $spp_detail->sisa_bayar - $bayar_spp[$key],
                'status_bayar' => $status_bayar
            ];

            $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                        ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                        ->firstOrFail()->id_spp;

            $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

            $total_harus_bayar = $get_total_harus_bayar - $bayar_spp[$key];

            SppDetail::where('id_spp_detail',$id_detail[$key])
                    ->update($data_spp_detail);

            Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
        }

        $data_spp_bayar = [
            'id_spp_bulan_tahun' => $id_bulan_tahun,
            'tanggal_bayar'      => $tanggal_bayar,
            'total_biaya'        => $total_biaya,
            'nominal_bayar'      => $bayar_total,
            'kembalian'          => $kembalian,
            'keterangan_bayar'   => $keterangan
        ];
        SppBayar::create($data_spp_bayar);
        $spp_detail_row = SppDetail::getBayarById($id_detail);

        $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

        // return redirect('/petugas/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Bayar SPP');
        return view('Petugas.spp-detail.struk',compact('total_biaya','spp_detail_row','tanggal_bayar','id','id_bulan_tahun','petugas'));
    }

    public function delete($id,$id_bulan_tahun,$id_detail)
    {
        SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->where('id_spp_detail',$id_detail)
                    ->delete();

        return redirect('/petugas/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Hapus Data');
    }

    public function lihatPembayaran($id,$id_bulan_tahun)
    {   
        $title = 'Lihat Pembayaran';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);

        return view('Petugas.spp-bayar.main',compact('title','id','id_bulan_tahun'));
    }

    public function lihatPembayaranDelete($id,$id_bulan_tahun,$id_detail)
    {   
        SppBayar::where('id_spp_bulan_tahun',$id_bulan_tahun)
                ->where('id_spp_bayar',$id_detail)
                ->delete();

        return redirect('/petugas/spp/bulan-tahun/'.$id.'/lihat-pembayaran/'.$id_bulan_tahun)->with('message','Berhasil Delete Pembayaran SPP');
    }
}
