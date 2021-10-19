<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppBayar extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bayar';
    protected $primaryKey = 'id_spp_bayar';
    public $timestamps    = false;
    protected $guarded    = [];
}
