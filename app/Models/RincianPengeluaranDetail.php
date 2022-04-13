<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPengeluaranDetail extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_pengeluaran_detail';
    protected $primaryKey = 'id_rincian_pengeluaran_detail';
    protected $guarded    = [];
}
