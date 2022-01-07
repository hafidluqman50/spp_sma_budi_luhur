<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class LaporanController extends Controller
{
    public function laporanKantinView()
    {
        $title = 'Laporan Kantin';

        return view('Admin.laporan.laporan-kantin',compact('title'));
    }

    public function laporanCetak(Request $request)
    {
        if ($request->btn_cetak == 'laporan-kantin') {
            $this->laporanKantin($request);
        }
    }

    public function laporanKantin(Request $request)
    {
        $bulan       = $request->bulan;
        $tahun       = $request->tahun;
        $kantin_nama = $request->kantin_nama;

        $title    = 'LAPORAN KANTIN '.strtoupper($kantin_nama);
        $fileName = $title.'.xlsx';

        $spreadsheet = new Spreadsheet();
        for ($i=1; $i <= $bulan; $i++) {
            
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }
}
