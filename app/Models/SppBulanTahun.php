<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SppDetail;
use App\Models\Traits\UuidInsert;

class SppBulanTahun extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bulan_tahun';
    protected $primaryKey = 'id_spp_bulan_tahun';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function checkStatus($id)
    {
        $count1 = SppDetail::where('id_spp_bulan_tahun',$id)->count();
        $count2 = SppDetail::where('id_spp_bulan_tahun',$id)->where('status_bayar',1)->count();
        if ($count2 == $count1) {
            $status = 1;
        }
        else {
            $status = 0;
        }

        return $status;
    }
}
