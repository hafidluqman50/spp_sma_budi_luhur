<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPembelanjaan extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_pembelanjaan';
    protected $primaryKey = 'id_rincian_pembelanjaan';
    protected $guarded    = [];

    public static function getRincianByKategori($kategori,$jenis)
    {
        $get = self::join('rincian_pengeluaran_detail','rincian_pembelanjaan.id_rincian_pengeluaran_detail','=','rincian_pengeluaran_detail.id_rincian_pengeluaran_detail')
                    ->where('kategori_rincian_pembelanjaan',$kategori)
                    ->where('jenis_rincian_pembelanjaan',$jenis)
                    ->get();

        return $get;
    }
}
