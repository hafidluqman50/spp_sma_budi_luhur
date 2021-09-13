<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class TahunAjaran extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    public $timestamps    = false;
    protected $guarded    = [];
}
