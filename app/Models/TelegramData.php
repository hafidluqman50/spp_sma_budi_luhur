<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class TelegramData extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'telegram_data';
    protected $primaryKey = 'id_telegram_data';
    public $timestamps    = false;
    protected $guarded    = [];
}
