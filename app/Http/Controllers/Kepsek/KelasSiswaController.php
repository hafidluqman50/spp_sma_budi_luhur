<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use Illuminate\Support\Str;

class KelasSiswaController extends Controller
{
    public function index($id)
    {
        $title = 'Kelas Siswa | Kepsek';

        return view('Kepsek.kelas-siswa.main',compact('title','id'));
    }
}
