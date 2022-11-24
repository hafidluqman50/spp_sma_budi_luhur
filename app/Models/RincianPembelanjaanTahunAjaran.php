<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPembelanjaanTahunAjaran extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_penerimaan_tahun_ajaran';
    protected $primaryKey = 'id_rincian_penerimaan_tahun_ajaran';
    protected $guarded    = [];
}
