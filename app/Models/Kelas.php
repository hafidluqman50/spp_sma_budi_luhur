<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Kelas extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps    = false;
    protected $guarded    = [];
}
