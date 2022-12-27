<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class ProfileInstansi extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'profile_instansi';
    protected $primaryKey = 'id_profile_instansi';
    protected $guarded    = [];
    public $timestamps    = false;
}
