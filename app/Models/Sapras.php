<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Sapras extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'sapras';
    protected $primaryKey = 'id_sapras';
    protected $guarded    = [];
}
