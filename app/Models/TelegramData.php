<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;
use App\Models\Siswa;

class TelegramData extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'telegram_data';
    protected $primaryKey = 'id_telegram_data';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function keterangan($nomor)
    {
        $siswa = Siswa::where('nomor_orang_tua',$nomor)->where('status_delete',0)->get();
        $text = 'Ortu ';
        foreach ($siswa as $key => $value) {
            $text.=''.$value->nama_siswa.', ';
        }

        return rtrim($text,', ');
    }
}
