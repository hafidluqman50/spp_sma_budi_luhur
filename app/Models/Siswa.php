<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Siswa extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function getNamaKeluarga($id_siswa_keluarga)
    {
        $get = self::where('id_siswa',$id_siswa_keluarga)->firstOrFail()->nama_siswa;

        return $get;
    }
}
