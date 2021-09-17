<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class KolomSpp extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'kolom_spp';
    protected $primaryKey = 'id_kolom_spp';
    public $timestamps    = false;
    protected $guarded    = [];
}
