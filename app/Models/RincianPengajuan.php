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
}
