<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppBulanTahun extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_bulan_tahun';
    protected $primaryKey = 'id_spp_bulan_tahun';
    public $timestamps    = false;
    protected $guarded    = [];
}
