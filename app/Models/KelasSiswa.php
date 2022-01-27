<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;
use Illuminate\Support\Str;

class KelasSiswa extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'kelas_siswa';
    protected $primaryKey = 'id_kelas_siswa';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function getData($id)
    {
        $get = self::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('kelas_siswa.id_kelas',$id)
                    ->where('kelas_siswa.status_delete',0)
                    ->get();

        return $get;
    }

    public static function getByIdKelas($id)
    {
        $get = self::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('kelas_siswa.id_kelas',$id)
                    ->get();

        return $get;
    }

    public static function countByIdKelas($id)
    {
        $get = self::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('kelas_siswa.id_kelas',$id)
                    ->count();

        return $get;
    }

    public static function checkSiswa($nisn,$kelas,$tahun_ajaran)
    {
        $count = self::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('nisn',$nisn)
                    ->where('slug_kelas',Str::slug($kelas,'-'))
                    ->where('tahun_ajaran',$tahun_ajaran)
                    ->count();

        if ($count == 0) {
            $value = 'false';
        }
        else {
            $value = 'true';
        }

        return $value;
    }

    public static function getSiswa($nisn,$kelas,$tahun_ajaran)
    {
        $get = self::join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('nisn',$nisn)
                    ->where('slug_kelas',Str::slug($kelas,'-'))
                    ->where('tahun_ajaran',$tahun_ajaran)
                    ->get();

        return $get;
    }

    public static function getSiswaByKelasTahun($id_kelas,$id_tahun_ajaran)
    {
        $get = self::join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->where('id_kelas',$id_kelas)
                    ->where('id_tahun_ajaran',$id_tahun_ajaran)
                    ->get();

        return $get;
    }
}
