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
}
