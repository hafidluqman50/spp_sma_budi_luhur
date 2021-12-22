<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class Kepsek extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'kepsek';
    protected $primaryKey = 'id_kepsek';
    public $timestamps    = false;
    protected $guarded    = [];

    public static function showData()
    {
        $query = self::join('users','kepsek.id_users','=','users.id_users')
                    ->get();
        return $query;
    }
}
