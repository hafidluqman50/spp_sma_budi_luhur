<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class RincianPenerimaan extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'rincian_penerimaan';
    protected $primaryKey = 'id_rincian_penerimaan';
    protected $guarded    = [];
}
