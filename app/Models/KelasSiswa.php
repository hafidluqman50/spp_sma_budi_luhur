<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

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
                    ->get();

        return $get;
    }
}
