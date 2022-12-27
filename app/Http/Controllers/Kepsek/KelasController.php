<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $title = 'Kelas | Kepsek';

        return view('Kepsek.kelas.main',compact('title'));
    }
}
