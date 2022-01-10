<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SppDetail;
use App\Models\Traits\UuidInsert;

class SppBulanTahun extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bulan_tahun';
    protected $primaryKey = 'id_spp_bulan_tahun';
    protected $guarded    = [];

    public static function checkStatus($id)
    {
        $count1 = SppDetail::where('id_spp_bulan_tahun',$id)->count();
        $count2 = SppDetail::where('id_spp_bulan_tahun',$id)->where('status_bayar',1)->count();
        if ($count2 == $count1) {
            $status = 1;
        }
        else {
            $status = 0;
        }

        return $status;
    }

    public static function getSiswa($id)
    {
        $get = self::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('spp_bulan_tahun.id_spp',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getRowById($id)
    {
        $get = self::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('id_spp_bulan_tahun',$id)
                    ->firstOrFail();

        return $get;
    }
}
