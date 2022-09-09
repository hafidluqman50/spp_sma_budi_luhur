<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPengajuan extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_pengajuan';
    protected $primaryKey = 'id_rincian_pengajuan';
    protected $guarded    = [];

    public static function getRincianByKategori($kategori)
    {
        $get = self::join('rincian_pengeluaran_detail','rincian_pengajuan.id_rincian_pengeluaran_detail','=','rincian_pengeluaran_detail.id_rincian_pengeluaran_detail')
                    ->where('kategori_rincian_pengajuan',$kategori)
                    ->get();

        return $get;
    }
}
