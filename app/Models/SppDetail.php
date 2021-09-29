<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class SppDetail extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp_detail';
    protected $primaryKey = 'id_spp_detail';
    public $timestamps    = false;
    protected $guarded    = [];
}
