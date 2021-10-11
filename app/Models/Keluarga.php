<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Keluarga extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function keluarga_check($id,$id_keluarga)
    {
        $get = self::where('id_siswa',$id)
                    ->where('id_siswa_keluarga',$id_keluarga)
                    ->count();

        if ($get > 0) {
            $check = 'true';
        }
        else {
            $check = 'false';
        }

        return $check;
    }
}
