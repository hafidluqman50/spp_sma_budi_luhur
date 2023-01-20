<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\Petugas;
use App\Models\HistoryProsesSpp;
use App\Models\PemasukanKantin;
use App\Models\ProfileInstansi;
use Auth;

class SppDetailController extends Controller
{
    public function index($id,$id_bulan_tahun)
    {
        $title = 'SPP Detail | Admin';
        $siswa = SppBulanTahun::getRowById($id_bulan_tahun);

        return view('Admin.spp-detail.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function formBayar($id,$id_bulan_tahun,$id_detail)
    {
        $title = 'Form Bayar | Admin';
        $spp   = SppDetail::getBayarById($id_detail);

        return view('Admin.spp-detail.spp-detail-bayar',compact('title','id','id_bulan_tahun','id_detail','spp'));
    }

    public function bayar(Request $request,$id,$id_bulan_tahun,$id_detail)
    {
        $tanggal_bayar     = date('Y-m-d');
        $bayar_spp         = $request->bayar_spp;
        $total_biaya       = $request->total_biaya;
        $bayar_total       = $request->bayar_total;
        $kembalian         = $request->kembalian;
        $keterangan        = $request->keterangan_spp;
        $jenis_bayar       = $request->jenis_bayar;
        
        $id_spp_bayar      = (string)Str::uuid();
        $id_spp_bayar_data = (string)Str::uuid();

        $spp_detail = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')->where('id_spp_detail',$id_detail)->firstOrFail();

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
            'status_bayar' => $status_bayar,
            'updated_at'   => date('Y-m-d H:i:s')
        ];

        $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                    ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                    ->firstOrFail()->id_spp;

        SppDetail::where('id_spp_detail',$id_detail)
                ->update($data_spp_detail);

        if ($spp_detail->slug_kolom_spp == 'uang-makan') {
            $get_kantin = SppBulanTahun::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                        ->firstOrFail();

            $id_kantin = $get_kantin->id_kantin;

            $check_pemasukan_kantin = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                      ->where('id_kantin',$get_kantin->id_kantin)
                                                      ->count();
            if ($check_pemasukan_kantin > 0) {
                $nominal_lama = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                            ->where('id_kantin',$get_kantin->id_kantin)
                                            ->firstOrFail()->nominal_pemasukan;

                $nominal_kalkulasi = $nominal_lama + $bayar_spp;
                $nominal = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                            ->where('id_kantin',$get_kantin->id_kantin)
                                            ->update(['nominal_pemasukan' => $nominal_kalkulasi]);
            }
            else {
                $data_pemasukan_kantin = [
                    'id_spp_bulan_tahun' => $spp_detail->id_spp_bulan_tahun,
                    'id_kantin'          => $spp_detail->id_kantin,
                    'nominal_pemasukan'  => $bayar_spp
                ];

                $nominal = PemasukanKantin::create($data_pemasukan_kantin);
            }
        }
        else {
            $id_kantin = null;
        }

        $data_spp_bayar_data = [
            'id_spp_bayar_data'    => $id_spp_bayar_data,
            'id_spp'               => $get_id_spp,
            'tanggal_bayar'        => $tanggal_bayar,
            'total_biaya'          => $total_biaya,
            'nominal_bayar'        => $bayar_total,
            'kembalian'            => $kembalian,
            'keterangan_bayar_spp' => $keterangan,
            'jenis_bayar'          => $jenis_bayar,
            'id_users'             => auth()->user()->id_users
        ];
        SppBayarData::create($data_spp_bayar_data);

        $data_spp_bayar = [
            'id_spp_bayar'       => $id_spp_bayar,
            'id_spp_bayar_data'  => $id_spp_bayar_data,
            'id_spp_bulan_tahun' => $id_bulan_tahun
        ];
        SppBayar::create($data_spp_bayar);

        $data_spp_bayar_detail = [
            'id_spp_bayar'  => $id_spp_bayar,
            'id_kolom_spp'  => $spp_detail->id_kolom_spp,
            'nominal_bayar' => $bayar_spp,
            'tanggal_bayar' => $tanggal_bayar,
            'id_kantin'     => $id_kantin
        ];
        SppBayarDetail::create($data_spp_bayar_detail);

        // Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
        $spp_detail_row = SppDetail::getBayarById($id_detail);

        // $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();
        $profile_instansi = ProfileInstansi::firstOrFail();

        $spp_row = SppDetail::getBayarById($id_detail);

        // $text_history = Auth::user()->name.' telah membayar SPP : <b> '.$spp_row->nama_siswa.' Kelas '.$spp_row->kelas.' Tahun Ajaran '.$spp_row->tahun_ajaran.'</b>. Bulan, Tahun : <b>'.$spp_row->bulan_tahun.'</b>, <b>'.$spp_row->nama_kolom_spp.'</b> Sebesar <b>'.format_rupiah($bayar_spp).'</b> dan dengan total nominal bayar sebesar <b>'.format_rupiah($bayar_total).'</b>';

        // $history = ['text' => $text_history,'status_terbaca' => 0];
        // HistoryProsesSpp::create($history);

        // return redirect('/admin/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Bayar SPP');
        return view('Admin.spp-detail.struk',compact('total_biaya','spp_detail_row','tanggal_bayar','id','id_bulan_tahun','profile_instansi'));
    }

    public function formBayarSemua($id,$id_bulan_tahun)
    {
        $title = 'Form Bayar Semua | Admin';
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

        return view('Admin.spp-detail.spp-detail-bayar-semua',compact('title','id','id_bulan_tahun','total_semua','spp','spp_bayar'));
    }

    public function bayarSemua(Request $request,$id,$id_bulan_tahun)
    {
        $tanggal_bayar     = date('Y-m-d');
        $id_spp_bayar_data = (string)Str::uuid();
        $id_spp_bayar      = (string)Str::uuid();
        $id_detail         = $request->id_detail;
        $bayar_spp         = $request->bayar_spp;
        $total_biaya       = $request->total_biaya;
        $bayar_total       = $request->bayar_total;
        $kembalian         = $request->kembalian;
        $keterangan        = $request->keterangan_spp;
        $jenis_bayar       = $request->jenis_bayar;

        foreach ($bayar_spp as $key => $value) {
            $spp_detail = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')->where('id_spp_detail',$id_detail[$key])->firstOrFail();

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
                'status_bayar' => $status_bayar,
                'updated_at'   => date('Y-m-d H:i:s')
            ];

            $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                        ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                        ->firstOrFail()->id_spp;

            // $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

            // $total_harus_bayar = $get_total_harus_bayar - $bayar_spp[$key];

            SppDetail::where('id_spp_detail',$id_detail[$key])
                    ->update($data_spp_detail);
            if ($bayar_spp[$key] != null) {
                $data_spp_bayar_detail[] = [
                    'id_spp_bayar_detail' => (string)Str::uuid(),
                    'id_spp_bayar'        => $id_spp_bayar,
                    'id_kolom_spp'        => $spp_detail->id_kolom_spp,
                    'nominal_bayar'       => $bayar_spp[$key],
                    'tanggal_bayar'       => $tanggal_bayar,
                    'id_kantin'           => '',
                ];
                
                if ($spp_detail->slug_kolom_spp == 'uang-makan') {
                    $get_kantin = SppBulanTahun::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                ->firstOrFail();

                    $data_spp_bayar_detail[$key]['id_kantin'] = $get_kantin->id_kantin;

                    $check_pemasukan_kantin = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                              ->where('id_kantin',$get_kantin->id_kantin)
                                                              ->count();
                    if ($check_pemasukan_kantin > 0) {
                        $nominal_lama = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                    ->where('id_kantin',$get_kantin->id_kantin)
                                                    ->firstOrFail()->nominal_pemasukan;

                        $nominal_kalkulasi = $nominal_lama + $bayar_spp;
                        $nominal = PemasukanKantin::where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                    ->where('id_kantin',$get_kantin->id_kantin)
                                                    ->update(['nominal_pemasukan' => $nominal_kalkulasi]);
                    }
                    else {
                        $data_pemasukan_kantin = [
                            'id_spp_bulan_tahun' => $spp_detail->id_spp_bulan_tahun,
                            'id_kantin'          => $spp_detail->id_kantin,
                            'nominal_pemasukan'  => $bayar_spp
                        ];

                        $nominal = PemasukanKantin::create($data_pemasukan_kantin);
                    }
                }
                else {
                    $data_spp_bayar_detail[$key]['id_kantin'] = null;
                }
            }

            // Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);

            $spp_row = SppDetail::getBayarById($id_detail[$key]);

            // $text_history = Auth::user()->name.' telah membayar SPP : <b> '.$spp_row->nama_siswa.' Kelas '.$spp_row->kelas.' Tahun Ajaran '.$spp_row->tahun_ajaran.'</b>. Bulan, Tahun : <b>'.$spp_row->bulan_tahun.'</b>, <b>'.$spp_row->nama_kolom_spp.'</b> Sebesar <b>'.format_rupiah($bayar_spp[$key]).'</b> dan dengan total nominal bayar sebesar <b>'.format_rupiah($bayar_total).'</b>';

            // $history = ['text' => $text_history,'status_terbaca' => 0];
            // HistoryProsesSpp::create($history);
        }

        $data_spp_bayar_data = [
            'id_spp_bayar_data'    => $id_spp_bayar_data,
            'id_spp'               => $get_id_spp,
            'tanggal_bayar'        => $tanggal_bayar,
            'total_biaya'          => $total_biaya,
            'nominal_bayar'        => $bayar_total,
            'kembalian'            => $kembalian,
            'keterangan_bayar_spp' => $keterangan,
            'jenis_bayar'          => $jenis_bayar,
            'id_users'             => auth()->user()->id_users
        ];
        SppBayarData::create($data_spp_bayar_data);

        $data_spp_bayar = [
            'id_spp_bayar'       => $id_spp_bayar,
            'id_spp_bayar_data'  => $id_spp_bayar_data,
            'id_spp_bulan_tahun' => $id_bulan_tahun
        ];
        SppBayar::create($data_spp_bayar);

        SppBayarDetail::insert($data_spp_bayar_detail);

        $spp_detail_row = SppDetail::getBayarById($id_detail);

        // $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();
        $profile_instansi = ProfileInstansi::firstOrFail();

        // return redirect('/admin/spp/bulan-tahun/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Bayar SPP');
        return view('Admin.spp-detail.struk',compact('total_biaya','spp_detail_row','tanggal_bayar','id','id_bulan_tahun','profile_instansi'));
    }

    public function delete($id,$id_bulan_tahun,$id_detail)
    {
        $spp_row = SppDetail::getBayarById($id_detail);

        // $text_history = Auth::user()->name.' telah menghapus SPP : <b> '.$spp_row->nama_siswa.' Kelas '.$spp_row->kelas.' Tahun Ajaran '.$spp_row->tahun_ajaran.'</b>. Bulan, Tahun : <b>'.$spp_row->bulan_tahun.'</b>, <b>'.$spp_row->nama_kolom.'</b>';

        // $history = ['text' => $text_history,'status_terbaca' => 0];
        // HistoryProsesSpp::create($history);

        SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                    ->where('id_spp_detail',$id_detail)
                    ->delete();

        return redirect('/admin/spp/tunggakan/'.$id.'/lihat-spp/'.$id_bulan_tahun)->with('message','Berhasil Hapus Data');
    }

    public function lihatPembayaran($id,$id_bulan_tahun)
    {   
        $title = 'Lihat Pembayaran';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);
        
        return view('Admin.spp-bayar.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function lihatPembayaranDetail($id,$id_bulan_tahun,$id_spp_bayar)
    {   
        $title = 'Lihat Pembayaran Detail | Admin';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);
        
        return view('Admin.spp-bayar.detail',compact('title','id','id_bulan_tahun','siswa','id_spp_bayar'));
    }

    public function lihatPembayaranDelete($id,$id_bulan_tahun,$id_detail)
    {  
        $spp_row = SppBayar::getBayarById($id_detail);

        $text_history = Auth::user()->name.' telah menghapus Pembayaran : <b> '.$spp_row->nama_siswa.' Kelas '.$spp_row->kelas.' Tahun Ajaran '.$spp_row->tahun_ajaran.'</b>. Dengan jumlah Total Biaya : <b>'.format_rupiah($spp_row->total_biaya).'</b>, Nominal Bayar : <b>'.format_rupiah($spp_row->nominal_bayar).'</b>, dan Kembalian : <b>'.format_rupiah($spp_row->kembalian).'</b> dengan Keterangan : <b>'.$spp_row->keterangan.'</b> yang telah diinput oleh <b>'.$spp_row->name.'</b>';

        $get_spp_bayar_detail = SppBayarDetail::where('id_spp_bayar',$spp_row->id_spp_bayar)->get();

        foreach ($get_spp_bayar_detail as $key => $value) {
            $get_spp_detail = SppDetail::where('id_spp_bulan_tahun',$spp_row->id_spp_bulan_tahun)
                    ->where('id_kolom_spp',$value->id_kolom_spp)->firstOrFail();

            SppDetail::where('id_spp_bulan_tahun',$spp_row->id_spp_bulan_tahun)
                    ->where('id_kolom_spp',$value->id_kolom_spp)
                    ->update([
                              'bayar_spp'    => $get_spp_detail->bayar_spp - $value->nominal_bayar,
                              'sisa_bayar'   => $get_spp_detail->sisa_bayar + $value->nominal_bayar,
                              'status_bayar' => 0
                          ]);

            // $total_harus_bayar_spp = Spp::where('id_spp',$spp_row->id_spp)->firstOrFail()->total_harus_bayar;
            // Spp::where('id_spp',$spp_row->id_spp)->update(['total_harus_bayar' => $total_harus_bayar_spp + $value->nominal_bayar]);
        }


        $history = ['text' => $text_history,'status_terbaca' => 0];
        HistoryProsesSpp::create($history);

        SppBayar::where('id_spp_bulan_tahun',$id_bulan_tahun)
                ->where('id_spp_bayar',$id_detail)
                ->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_bulan_tahun)->with('message','Berhasil Delete Pembayaran SPP');
    }

    public function lihatPembayaranDetailDelete($id,$id_bulan_tahun,$id_bayar,$id_detail)
    {

        $spp_row = SppBayarDetail::getBayarById($id_detail);

        $text_history = Auth::user()->name.' telah menghapus Pembayaran : <b> '.$spp_row->nama_siswa.' Kelas '.$spp_row->kelas.' Tahun Ajaran '.$spp_row->tahun_ajaran.'</b>. Dengan jumlah Total Biaya : <b>'.format_rupiah($spp_row->total_biaya).'</b>, Nominal Bayar : <b>'.format_rupiah($spp_row->nominal_bayar).'</b>, dan Kembalian : <b>'.format_rupiah($spp_row->kembalian).'</b> dengan Keterangan : <b>'.$spp_row->keterangan.'</b>, Kolom SPP : <b>'.$spp_row->nama_kolom_spp.'</b> yang telah diinput oleh <b>'.$spp_row->name.'</b>';

        $history = ['text' => $text_history,'status_terbaca' => 0];
        HistoryProsesSpp::create($history);

        $get_spp_detail = SppDetail::where('id_spp_bulan_tahun',$id_bulan_tahun)
                ->where('id_kolom_spp',$spp_row->id_kolom_spp)->firstOrFail();

        SppDetail::where('id_spp_bulan_tahun',$spp_row->id_spp_bulan_tahun)
                ->where('id_kolom_spp',$spp_row->id_kolom_spp)
                ->update([
                          'bayar_spp'    => $get_spp_detail->bayar_spp - $spp_row->nominal_bayar_detail,
                          'sisa_bayar'   => $get_spp_detail->sisa_bayar + $spp_row->nominal_bayar_detail,
                          'status_bayar' => 0
                        ]);

        // $nominal_spp_bayar     = SppBayar::where('id_spp_bayar',$spp_row->id_spp_bayar)->firstOrFail()->nominal_bayar;
        // $total_harus_bayar_spp = Spp::where('id_spp',$spp_row->id_spp)->firstOrFail()->total_harus_bayar;

        // SppBayar::where('id_spp_bayar',$spp_row->id_spp_bayar)->update(['nominal_bayar' => $nominal_spp_bayar - $spp_row->nominal_bayar]);
        // Spp::where('id_spp',$spp_row->id_spp)->update(['total_harus_bayar' => $total_harus_bayar_spp + $spp_row->nominal_bayar_detail]);

        SppBayarDetail::where('id_spp_bayar_detail',$id_detail)
                ->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_bulan_tahun.'/detail/'.$id_bayar)->with('message','Berhasil Delete SPP Bayar Detail');
    }

    public function cetakStruk($id,$id_bulan_tahun,$id_spp_bayar)
    {

        $spp_detail_row = SppBayar::getStruk($id,$id_bulan_tahun,$id_spp_bayar);

        // $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();
        $profile_instansi = ProfileInstansi::firstOrFail();
        return view('Admin.spp-bayar.struk',compact('spp_detail_row','id','id_bulan_tahun','profile_instansi'));
    }
}
