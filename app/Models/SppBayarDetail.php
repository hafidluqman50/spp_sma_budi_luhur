<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppBayarDetail extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bayar_detail';
    protected $primaryKey = 'id_spp_bayar_detail';
    protected $guarded    = [];

    public static function getBayarById($id)
    {
        $get = self::join('spp_bayar','spp_bayar_detail.id_spp_bayar','=','spp_bayar.id_spp_bayar')
                    ->join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->join('users','spp_bayar.id_users','=','users.id_users')
                    ->where('spp_bayar_detail.id_spp_bayar_detail',$id)
                    ->select(['*','spp_bayar_detail.nominal_bayar AS nominal_bayar_detail'])
                    ->firstOrFail();

        return $get;
    }
}
