<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPenerimaanTahunAjaran extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_penerimaan_tahun_ajaran';
    protected $primaryKey = 'id_rincian_penerimaan_tahun_ajaran';
    protected $guarded    = [];

    public static function getRincian($id,$bulan,$tahun)
    {
        $check = self::where('id_rincian_pengeluaran',$id)->where('bulan',$bulan)->where('tahun',$tahun)->count();

        if ($check == 0) {
            $get  = new \stdClass();
            $get->pemasukan                            = 0;
            $get->realisasi_pengeluaran                = 0;
            $get->sisa_akhir_bulan                     = 0;
            $get->id_rincian_penerimaan_tahun_ajaran   = '';
        }
        else {
            $get = self::where('id_rincian_pengeluaran',$id)
                        ->where('bulan',$bulan)
                        ->where('tahun',$tahun)
                        ->firstOrFail();
        }

        return $get;
    }
}
