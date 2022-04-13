<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPengeluaran extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_pengeluaran';
    protected $primaryKey = 'id_rincian_pengeluaran';
    protected $guarded    = [];
}
