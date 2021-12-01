<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\KelasSiswa;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;

class AjaxController extends Controller
{
    public function getSiswa($id_kelas,$id_tahun_ajaran)
    {
        $get = KelasSiswa::getSiswaByKelasTahun($id_kelas,$id_tahun_ajaran);

        $html[0] = '<option value="" selected="" disabled="">=== Pilih Siswa ===</option>';
        foreach ($get as $key => $value) {
            $html[] = '<option value="'.$value->id_kelas_siswa.'">'.$value->nisn.' | '.$value->nama_siswa.'</option>';
        }

        return response()->json($html);
    }
    public function getSiswaDashboard($id_kelas,$id_tahun_ajaran)
    {
        $get = KelasSiswa::getSiswaByKelasTahun($id_kelas,$id_tahun_ajaran);

        $html[0] = '<option value="" selected="" disabled="">=== Pilih Siswa ===</option>';
        foreach ($get as $key => $value) {
            $html[] = '<option value="'.$value->id_siswa.'">'.$value->nisn.' | '.$value->nama_siswa.'</option>';
        }

        return response()->json($html);
    }

    public function getTunggakan($id_siswa,$id_kelas,$id_tahun_ajaran)
    {
        $id_kelas_siswa = KelasSiswa::where('id_siswa',$id_siswa)
                                    ->where('id_kelas',$id_kelas)
                                    ->where('id_tahun_ajaran',$id_tahun_ajaran)
                                    ->get()[0]->id_kelas_siswa;

        $get_siswa = Siswa::where('id_siswa',$id_siswa)->firstOrFail();

        $siswa = ['nama_siswa' => $get_siswa->nama_siswa, 'wilayah' => unslug_str($get_siswa->wilayah)];

        if (Spp::where('id_kelas_siswa',$id_kelas_siswa)->count() != 0) {
            $id_spp = Spp::where('id_kelas_siswa',$id_kelas_siswa)->get()->id_spp;

            $get_bulan_tunggakan = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->where('id_spp',$id_spp)
                                            ->where('sisa_bayar','!=',0)
                                            ->select('spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->groupBy('spp_bulan_tahun.id_spp_bulan_tahun')
                                            // ->distinct('spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->get();

            if (count($get_bulan_tunggakan) == 0) {
                $table[] = '<tr>
                                <td colspan="3" align="center">Data Tidak Ada</td>
                            </tr>';
            }

            foreach ($get_bulan_tunggakan as $key => $value) {
                $no = $key+1;

                $get_spp_bulan_tahun = SppBulanTahun::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)->firstOrFail();

                $table[] = '<tr>
                                <td>'.$no.'</td>
                                <td>'.$get_spp_bulan_tahun->bulan_tahun.'</td>
                                <td><button type="button" class="btn btn-primary tombol-bayar" id="tombol-bayar" id-spp-bulan-tahun="'.$value->id_spp_bulan_tahun.'">Bayar</button></td>
                            </tr>';
            }
        }
        else {
            $table[] = '<tr>
                            <td colspan="3" align="center">Data Tidak Ada</td>
                        </tr>';   
        }

        return response()->json(['siswa' => $siswa,'table' => $table]);
    }

    public function getTunggakanDetail($id_spp_bulan_tahun)
    {
        $spp_detail = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                ->where('sisa_bayar','!=',0)
                                ->where('id_spp_bulan_tahun',$id_spp_bulan_tahun)
                                ->get();

        foreach ($spp_detail as $key => $value) {
            $html[] = '<div class="form-group row">
                            <label class="col-4 col-form-label">Kolom Spp</label>
                            <div class="col-7">
                                <input type="text" class="form-control" value="'.$value->nama_kolom_spp.'" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Nominal Spp</label>
                            <div class="col-7">
                                <input type="text" class="form-control" value="'.$value->sisa_bayar.'" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Bayar</label>
                            <div class="col-7">
                                <input type="number" name="bayar_spp[]" class="form-control" placeholder="Isi Jumlah Bayar" required="required" id-kolom-spp="'.$value->id_kolom_spp.'">
                                <label for="" class="label-bayar-kolom-spp" id-kolom-spp="'.$value->id_kolom_spp.'"><b>Rp. 0,00</b></label>
                            </div>
                        </div>
                        <input type="hidden" name="id_detail[]" value="'.$value->id_spp_detail.'">';
        }

        return response()->json(['id_spp_bulan_tahun' => $id_spp_bulan_tahun,'kolom_spp' => $html]);
    }

    public function getBayar(Request $request)
    {
        $id_spp_bulan_tahun = $request->id_spp_bulan_tahun;
        $total_biaya        = $request->total_biaya;
        $bayar_total        = $request->bayar_total;
        $kembalian          = $request->kembalian;
        $keterangan_spp     = $request->keterangan_spp;
        $id_spp_detail      = $request->id_detail;
        $bayar_spp          = $request->bayar_spp;

        if (!session()->has('bayar_spp')) {
            $session_bayar = ['data_master' => '', 'data_spp' => []];
        }

        $get_spp_bulan_tahun = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                            ->where('id_spp_bulan_tahun',$id_spp_bulan_tahun)
                                            ->firstOrFail();
        $data_master = [
            'nama_siswa'          => $get_spp_bulan_tahun->nama_siswa,
            'wilayah'             => unslug_str($get_spp_bulan_tahun->wilayah),
            'total_bayar'         => $total_biaya,
            'total_bayar_rupiah'  => format_rupiah($total_biaya),
            'bayar_total'         => $bayar_total,
            'kembalian'           => $kembalian,
            'terbilang'           => ucwords(terbilang($total_biaya)),
            'untuk_pembayaran'    => $get_spp_bulan_tahun->bulan_tahun,
            'tanggal_spp'         => date('Y-m-d'),
            'tanggal_spp_convert' => human_date(date('Y-m-d')),
            'id_spp_bulan_tahun'  => $id_spp_bulan_tahun,
            'keterangan'          => $keterangan_spp
        ];

        if (session()->has('bayar_spp')) {
            $check_data_master = session()->get('bayar_spp')['data_master'];
            if ($check_data_master != '') {
                
            }
        }

        foreach ($id_spp_detail as $key => $value) {
            $data_spp[] = [
                'id_spp_detail'      => $id_spp_detail[$key],
                'bayar_spp'          => $bayar_spp[$key]
            ];
        }
        $session_bayar['data_master'] = $data_master;
        array_push($session_bayar['data_spp'], $data_spp);

        session()->put('bayar_spp',$session_bayar);

        return response()->json($data_master);
    }
}
