<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Keluarga extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    public $timestamps    = false;
    protected $guarded    = [];
}
