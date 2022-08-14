<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;
use App\Models\SppBulanTahun;

class SppBayar extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bayar';
    protected $primaryKey = 'id_spp_bayar';
    protected $guarded    = [];

    public function getTanggalBayar($id_siswa,$bulan,$tahun)
    {
        $db = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                ->where('kelas_siswa.id_siswa',$id_siswa)
                ->whereMonth('spp_bayar.created_at',$bulan)
                ->whereYear('spp_bayar.created_at',$tahun)
                ->groupBy('kelas_siswa.id_siswa')
                ->get()[0]->tanggal_bayar;

        return $db;
    }

    public function getTotalDebit($id_siswa,$bulan,$tahun)
    {
        $db = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                ->where('kelas_siswa.id_siswa',$id_siswa)
                ->whereMonth('spp_bayar.created_at',$bulan)
                ->whereYear('spp_bayar.created_at',$tahun)
                // ->groupBy('kelas_siswa.id_siswa')
                ->sum('spp_bayar.nominal_bayar');
        return $db;
    }

    // public static function getSiswa($id)
    // {
    //     $get = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
    //                 ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
    //                 ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
    //                 ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
    //                 ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
    //                 ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
    //                 ->where('spp_bayar.id_spp_bulan_tahun',$id)
    //                 ->firstOrFail();

    //     return $get;
    // }

    public static function getSiswa($id)
    {
        $get = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('spp_bulan_tahun.id_spp_bulan_tahun',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getBayarById($id)
    {
        $get = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->join('users','spp_bayar.id_users','=','users.id_users')
                    ->where('id_spp_bayar',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getTotalPendapatan($tahun,$wilayah)
    {
        $get = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->whereYear('tanggal_bayar',$tahun)
                    ->where('wilayah',$wilayah)
                    ->sum('nominal_bayar');


        return $get;
    }

    public static function getStruk($id,$id_bulan_tahun,$id_spp_bayar)
    {
        $get = self::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->join('users','spp_bayar.id_users','=','users.id_users')
                    ->where('spp.id_spp',$id)
                    ->where('spp_bulan_tahun.id_spp_bulan_tahun',$id_bulan_tahun)
                    ->where('id_spp_bayar',$id_spp_bayar)
                    ->firstOrFail();   

        return $get;
    }

    public static function bulanPembayaran($id,$id_spp_bayar_data)
    {
        $get = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                    ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->where('spp_bayar_data.id_spp',$id)
                    ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                    ->groupBy('tahun')
                    ->orderBy('tahun','ASC')
                    ->get();

        $keterangan = '';
        if (count($get) > 1) {
            $bulan_awal = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->where('spp_bayar_data.id_spp',$id)
                                ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                                ->where('tahun',$get[0]->tahun)
                                ->orderBy('bulan','ASC')
                                ->firstOrFail()->bulan_tahun;

            $bulan_akhir = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->where('spp_bayar_data.id_spp',$id)
                                ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                                ->where('tahun',$get[1]->tahun)
                                ->orderBy('bulan','DESC')
                                ->firstOrFail()->bulan_tahun;

            $keterangan = find_replace_strip(str_replace(', ',' ',$bulan_awal),str_replace(', ',' ',$bulan_akhir));
        }
        else {
            $bulan_awal = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->where('spp_bayar_data.id_spp',$id)
                                ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                                ->where('tahun',$get[0]->tahun)
                                ->orderBy('bulan','ASC')
                                ->firstOrFail()->bulan_tahun;

            $bulan_akhir_check = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                    ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                    ->where('spp_bayar_data.id_spp',$id)
                                    ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                                    ->where('tahun',$get[0]->tahun)
                                    ->orderBy('bulan','ASC')
                                    ->get();

            if (count($bulan_akhir_check) == 1) {
                $bulan_akhir = self::join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                                    ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                    ->where('spp_bayar_data.id_spp',$id)
                                    ->where('spp_bayar_data.id_spp_bayar_data',$id_spp_bayar_data)
                                    ->where('tahun',$get[0]->tahun)
                                    ->orderBy('bulan','DESC')
                                    ->firstOrFail()->bulan_tahun;
                $keterangan = str_replace(', '.$get[0]->tahun,'',$bulan_awal).' - '.str_replace(', '.$get[0]->tahun,'',$bulan_akhir).$get[0]->tahun;
            }
            else {
                $keterangan = $bulan_awal;
            }
        }
        return $keterangan;
    }
}
