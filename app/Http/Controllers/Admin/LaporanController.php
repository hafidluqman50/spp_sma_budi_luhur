<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use App\Models\SppDetail;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use App\Models\Kelas;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function laporanKantinView()
    {
        $title = 'Laporan Kantin';

        return view('Admin.laporan.laporan-kantin',compact('title'));
    }

    public function laporanDataSiswaView()
    {
        $title        = 'Laporan Data Siswa';
        $kelas        = ['X','XI','XII'];
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Admin.laporan.laporan-data-siswa',compact('title','kelas','tahun_ajaran'));
    }

    public function laporanTunggakanView()
    {
        $title = 'Laporan Tunggakan';
        $kelas = ['X','XI','XII'];
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Admin.laporan.laporan-tunggakan',compact('title','kelas','tahun_ajaran'));
    }

    public function laporanRabView()
    {
        $title = 'Laporan RAB';

        return view('Admin.laporan.laporan-rab',compact('title'));
    }

    public function laporanCetak(Request $request)
    {
        if ($request->btn_cetak == 'laporan-kantin') {
            $this->laporanKantin($request);
        }
        if ($request->btn_cetak == 'laporan-data-siswa') {
            $this->laporanDataSiswa($request);
        }
        if ($request->btn_cetak == 'laporan-tunggakan') {
            $this->laporanTunggakan($request);
        }
        if ($request->btn_cetak == 'laporan-rab') {
            $this->laporanRab($request);
        }
    }

    public function laporanKantin(Request $request)
    {
        $bulan_laporan = $request->bulan_laporan;
        $tahun_laporan = $request->tahun_laporan;
        $kantin_nama   = $request->kantin_nama;

        $title    = 'LAPORAN KANTIN '.strtoupper($kantin_nama).' '.$tahun_laporan;
        $fileName = $title.'.xlsx';

        $spreadsheet = new Spreadsheet();
        for ($i=1; $i <= $bulan_laporan; $i++) {
            $index_sheet = $i - 1;
            $spreadsheet->setActiveSheetIndex($index_sheet)->setTitle(month(zero_front_number($i)));
            $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
            $spreadsheet->getActiveSheet()->setCellValue('B1','Nama');
            $spreadsheet->getActiveSheet()->setCellValue('C1','Nominal');
            $spreadsheet->getActiveSheet()->setCellValue('D1','Keterangan');
            $data_spp = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                    ->join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                    ->join('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                    ->where('bulan_tahun',month(zero_front_number($i)).', '.$tahun_laporan)
                    ->where('slug_nama_kantin',Str::slug($kantin_nama,'-'))
                    ->where('slug_kolom_spp','like','%uang-makan%')
                    ->get();
            $cell = 2;
            foreach ($data_spp as $key => $value) {
                $no = $key+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell,$no);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell,$value->nama_siswa);
                if ($value->nominal_spp == $value->sisa_bayar) {
                    $spreadsheet->getActiveSheet()->setCellValue('C'.$cell,'');
                    $spreadsheet->getActiveSheet()->setCellValue('D'.$cell,'BELUM');
                }
                else {
                    $spreadsheet->getActiveSheet()->setCellValue('C'.$cell,$value->bayar_spp);
                    $spreadsheet->getActiveSheet()->setCellValue('D'.$cell,'SUDAH');   
                }
                $cell++;
            }

            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell,'Total');
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell,'=SUM(C2:C'.$cell.')');
            $spreadsheet->getActiveSheet()->mergeCells('A'.$cell.':B'.$cell);
            $spreadsheet->getActiveSheet()->getStyle('A'.$cell.':B'.$cell)->applyFromArray([
                'alignment'=>[
                    'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                ]
            ]);

            $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
            $spreadsheet->getActiveSheet()->getStyle('A1:D'.$cell)->applyFromArray($styleTable);

            $spreadsheet->getActiveSheet()->getStyle('C2:C'.$cell)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            
            $spreadsheet->createSheet();
        }
        $spreadsheet->setActiveSheetIndex(0);

        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanDataSiswa(Request $request)
    {
        $tahun_ajaran      = $request->tahun_ajaran;
        $kelas_siswa_input = $request->kelas_siswa_input;

        $title    = 'LAPORAN DATA SISWA KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_ajaran;
        $fileName = $title.'.xlsx';

        $get_kelas = Kelas::where('slug_kelas','like','%'.$kelas_siswa_input.'-%')->get();
        $spreadsheet = new Spreadsheet();
        foreach ($get_kelas as $key => $value) {
            $spreadsheet->setActiveSheetIndex($key)->setTitle($value->kelas);
            $spreadsheet->getActiveSheet()->setCellValue('A1','Laporan Data Siswa Kelas '.$value->kelas);
            $spreadsheet->getActiveSheet()->setCellValue('A3','Tahun Ajaran '.$tahun_ajaran);
            $spreadsheet->getActiveSheet()->setCellValue('A5','No.');
            $spreadsheet->getActiveSheet()->setCellValue('B5','NISN');
            $spreadsheet->getActiveSheet()->setCellValue('C5','Nama Siswa');
            $spreadsheet->getActiveSheet()->setCellValue('D5','Jenis Kelamin');
            $spreadsheet->getActiveSheet()->setCellValue('E5','Tanggal Lahir');
            $spreadsheet->getActiveSheet()->setCellValue('F5','Asal Kelompok');
            $spreadsheet->getActiveSheet()->setCellValue('G5','Asal Wilayah');
            $spreadsheet->getActiveSheet()->setCellValue('H5','Wilayah');

            $data_siswa = KelasSiswa::getByIdKelas($value->id_kelas);
            $cell = 6;

            foreach ($data_siswa as $index => $val) {
                $no = $index+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell,$no);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell,$val->nisn);
                $spreadsheet->getActiveSheet()->setCellValue('C'.$cell,$val->nama_siswa);
                $spreadsheet->getActiveSheet()->setCellValue('D'.$cell,unslug_str($val->jenis_kelamin));
                $spreadsheet->getActiveSheet()->setCellValue('E'.$cell,human_date($val->tanggal_lahir));
                $spreadsheet->getActiveSheet()->setCellValue('F'.$cell,$val->asal_kelompok);
                $spreadsheet->getActiveSheet()->setCellValue('G'.$cell,$val->asal_wilayah);
                $spreadsheet->getActiveSheet()->setCellValue('H'.$cell,unslug_str($val->wilayah));
                $cell++;
            }
            $total_cell = $cell+1;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$total_cell,'Total Siswa : ');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$total_cell,KelasSiswa::countByIdKelas($value->id_kelas));
            $spreadsheet->getActiveSheet()->mergeCells('A1:H1');
            $spreadsheet->getActiveSheet()->mergeCells('A3:H3');
            $spreadsheet->getActiveSheet()->getStyle('A1:H3')->applyFromArray([
                'alignment'=>[
                    'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                ]
            ]);

            $spreadsheet->getActiveSheet()->getStyle('A'.$total_cell.':B'.$total_cell)->applyFromArray([
                'alignment'=>[
                    'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                ]
            ]);

            $cell_min = $cell-1;
            $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
            $spreadsheet->getActiveSheet()->getStyle('A5:H'.$cell_min)->applyFromArray($styleTable);
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

            $spreadsheet->createSheet();
        }
        $spreadsheet->setActiveSheetIndex(0);
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanTunggakan(Request $request)
    {
        $tahun_ajaran      = $request->tahun_ajaran;
        $kelas_siswa_input = $request->kelas_siswa_input;

        $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_laporan;
        $fileName = $title.'.xlsx';

        $spreadsheet = new Spreadsheet();

        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanRab(Request $request)
    {

    }
}
