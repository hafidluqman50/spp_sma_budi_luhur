<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;
use Illuminate\Support\Str;
use DB;

class SppDetail extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_detail';
    protected $primaryKey = 'id_spp_detail';
    protected $guarded    = [];

    public static function getSiswa($id)
    {
        $get = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('spp_detail.id_spp_bulan_tahun',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getBayarById($id)
    {
        $get = self::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                    ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('id_spp_detail',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getSiswaTunggakan($bulan_tahun,$kelas,$tahun_ajaran)
    {
        $get = self::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                            ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                            ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            // ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('kelas',$kelas)
                            ->where('tahun_ajaran',$tahun_ajaran)
                            ->where('bulan_tahun',$bulan_tahun)
                            ->where('status_bayar',0)
                            ->get();
        return $get;
    }

    public static function getTunggakanKolomSpp($id_kolom_spp,$id_bulan_tahun)
    {
        if (self::where('id_kolom_spp',$id_kolom_spp)->where('id_spp_bulan_tahun',$id_bulan_tahun)->count() != 0) {
            $get = self::where('id_kolom_spp',$id_kolom_spp)->where('id_spp_bulan_tahun',$id_bulan_tahun)->firstOrFail()->sisa_bayar;
        }
        else {
            $get = '-';
        }
        return $get;
    }

    public static function getTunggakanNominalRekap($id_kolom_spp,$id_siswa)
    {
        $count = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0);

        if ($count->count() != 0) {
            $get = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0)
                        ->sum('sisa_bayar');
        }
        else {
            $get = '-';
        }
        return $get;
    }

    public static function getTunggakanBulanTahun($id_kolom_spp,$id_bulan_tahun)
    {
        if (self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->where('id_kolom_spp',$id_kolom_spp)
                    ->where('spp_detail.id_spp_bulan_tahun',$id_bulan_tahun)
                    ->count() != 0) {

            $get = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('spp_detail.id_spp_bulan_tahun',$id_bulan_tahun)
                        ->firstOrFail()->bulan_tahun;

            $result = bulan_tahun_excel($get);
        }
        else {
            $result = '-';
        }
        return $result;
    }

    public static function getTunggakanBulanRekap($id_kolom_spp,$id_siswa)
    {
        $distinct_tahun_spp = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0)
                        ->distinct()
                        ->get('spp_bulan_tahun.tahun');
        if (count($distinct_tahun_spp) > 1) {
            $get_tahun_awal = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.tahun','ASC')
                        ->get()[0]->tahun;

            $get_tahun_akhir = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.tahun','DESC')
                        ->get()[0]->tahun;

            $get_bulan_awal = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('spp_bulan_tahun.tahun',$get_tahun_awal)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.bulan','ASC')
                        ->get()[0]->bulan;

            $get_bulan_akhir = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('spp_bulan_tahun.tahun',$get_tahun_akhir)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.bulan','DESC')
                        ->get()[0]->bulan;

            $result = bulan_tahun_excel_numeric($get_bulan_awal,$get_tahun_awal).'-'.bulan_tahun_excel_numeric($get_bulan_akhir,$get_tahun_akhir);

        }
        else if (count($distinct_tahun_spp) == 1) {
            $get_tahun_awal = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.tahun','ASC')
                        ->get()[0]->tahun;

            $get_bulan_awal = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                        ->where('id_kolom_spp',$id_kolom_spp)
                        ->where('kelas_siswa.id_siswa',$id_siswa)
                        ->where('spp_bulan_tahun.tahun',$get_tahun_awal)
                        ->where('status_bayar',0)
                        ->orderBy('spp_bulan_tahun.bulan','ASC')
                        ->get()[0]->bulan;

            $result = bulan_tahun_excel_numeric($get_bulan_awal,$get_tahun_awal);
        }
        else {
            $result = '-';
        }

        return $result;
    }

    public static function getTotalTunggakan($tahun,$wilayah) {
        $get = self::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->where('bulan_tahun','like','%'.$tahun.'%')
                    ->where('wilayah',$wilayah)
                    ->sum('sisa_bayar');

        return $get;
    }

    public static function getLaporanKantin($bulan,$tahun,$kantin_nama)
    {
        $data_spp = self::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                ->join('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                ->where('bulan_tahun',$bulan.', '.$tahun)
                ->where('slug_nama_kantin',Str::slug($kantin_nama,'-'))
                ->where('slug_kolom_spp','like','%uang-makan%')
                ->get();

        return $data_spp;
    }
}
