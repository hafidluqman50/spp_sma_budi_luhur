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
        if ($jenis == 'operasional') {
        $get = self::join('rincian_pengeluaran_sekolah','rincian_pembelanjaan.id_rincian_pengeluaran_sekolah','=','rincian_pengeluaran_sekolah.id_rincian_pengeluaran_sekolah')
                    ->where('kategori_rincian_pembelanjaan',$kategori)
                    ->where('jenis_rincian_pembelanjaan',$jenis)
                    ->get();
        }
        else {
        $get = self::join('rincian_pengeluaran_uang_makan','rincian_pembelanjaan.id_rincian_pengeluaran_uang_makan','=','rincian_pengeluaran_uang_makan.id_rincian_pengeluaran_uang_makan')
                    ->where('kategori_rincian_pembelanjaan',$kategori)
                    ->where('jenis_rincian_pembelanjaan',$jenis)
                    ->get();
        }

        return $get;
    }
}
