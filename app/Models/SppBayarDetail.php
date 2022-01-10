<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppBayarDetail extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bayar_detail';
    protected $primaryKey = 'id_spp_bayar_detail';
    protected $guarded    = [];
}
