<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Petugas extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function showData()
    {
        $query = self::join('users','petugas.id_users','=','users.id_users')
                    ->get();
        return $query;
    }
}
