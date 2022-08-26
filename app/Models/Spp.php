<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Spp extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp';
    protected $primaryKey = 'id_spp';
    protected $guarded    = [];

    public static function getRowById($id)
    {
        $get = self::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->join('users','spp.id_users','=','users.id_users')
                    ->where('id_spp',$id)
                    ->firstOrFail();

        return $get;
    }

    public static function getTunggakanBulanTahunRange($tahun_ajaran,$tahun_ajaran_,$kelas_siswa)
    {
        $sheet_bulan_tahun = self::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                ->join('spp_bulan_tahun','spp.id_spp','=','spp_bulan_tahun.id_spp')
                                ->where('bulan_tahun','like','%'.$tahun_ajaran.'%')
                                ->where('slug_kelas','like','%'.strtolower($kelas_siswa).'-%')
                                ->where('tahun_ajaran',$tahun_ajaran_)
                                ->distinct()
                                ->orderByRaw("FIELD(bulan_tahun,'Januari, $tahun_ajaran','Februari, $tahun_ajaran','Maret, $tahun_ajaran','April, $tahun_ajaran','Mei, $tahun_ajaran','Juni, $tahun_ajaran','Juli, $tahun_ajaran','Agustus, $tahun_ajaran','September, $tahun_ajaran','Oktober, $tahun_ajaran','November, $tahun_ajaran','Desember, $tahun_ajaran')")
                                ->get('bulan_tahun');

        return $sheet_bulan_tahun;
    }
}
