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
    public $timestamps    = false;
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
}
