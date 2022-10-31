<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class PemasukanKantin extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'pemasukan_kantin';
    protected $primaryKey = 'id_pemasukan_kantin';
    public $timestamps    = false;
    protected $guarded    = [];
}
