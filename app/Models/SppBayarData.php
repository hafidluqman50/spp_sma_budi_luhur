<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppBayarData extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bayar_data';
    protected $primaryKey = 'id_spp_bayar_data';
    protected $guarded    = [];

    public static function getTotalPendapatan($tahun,$wilayah)
    {
        $get = self::join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->whereYear('tanggal_bayar',$tahun)
                    ->where('wilayah',$wilayah)
                    ->sum('nominal_bayar');
                    
        return $get;
    }

    public static function getSiswaBayar($bulan,$tahun)
    {
        $data_pembayaran_spp = SppBayarData::join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                ->whereMonth('spp_bayar_data.created_at',$bulan)
                ->whereYear('spp_bayar_data.created_at',$tahun)
                // ->where('kelas_siswa.id_siswa',$data->id_siswa)
                ->get();

        return $data_pembayaran_spp;
    }
}
