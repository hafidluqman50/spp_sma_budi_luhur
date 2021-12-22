<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Siswa;
use App\Models\Keluarga;
use App\Models\User;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class SiswaController extends Controller
{
    public function index()
    {
        $title = 'Data Siswa | Admin';

        return view('Admin.siswa.main',compact('title'));
    }
}
