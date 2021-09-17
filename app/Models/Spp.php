<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Spp extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'spp';
    protected $primaryKey = 'id_spp';
    public $timestamps    = false;
    protected $guarded    = [];
}
