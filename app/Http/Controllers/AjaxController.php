<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasSiswa;

class AjaxController extends Controller
{
    public function getSiswa($id_kelas,$id_tahun_ajaran)
    {
        $get = KelasSiswa::getSiswaByKelasTahun($id_kelas,$id_tahun_ajaran);

        $html[0] = '<option value="" selected="" disabled="">=== Pilih Siswa ===</option>';
        foreach ($get as $key => $value) {
            $html[] = '<option value="'.$value->id_kelas_siswa.'">'.$value->nisn.' | '.$value->nama_siswa.'</option>';
        }

        return response()->json($html);
    }
}
