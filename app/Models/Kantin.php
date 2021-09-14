<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Kantin extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'kantin';
    protected $primaryKey = 'id_kantin';
    public $timestamps    = false;
    protected $guarded    = [];
}
