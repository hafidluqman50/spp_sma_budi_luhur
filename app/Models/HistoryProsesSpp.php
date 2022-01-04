<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidInsert;

class HistoryProsesSpp extends Model
{
    use HasFactory, UuidInsert;

    protected $table      = 'history_proses_spp';
    protected $primaryKey = 'id_history_proses_spp';
    protected $guarded    = [];
}
