<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPengeluaranUangMakan extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_pengeluaran_uang_makan';
    protected $primaryKey = 'id_rincian_pengeluaran_uang_makan';
    protected $guarded    = [];
}
