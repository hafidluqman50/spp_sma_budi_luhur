<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use App\Models\KolomSpp;
use App\Models\Kantin;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
use App\Models\RincianPembelanjaan;
use App\Models\RincianPengajuan;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\Sapras;
use Illuminate\Support\Str;
use DB;

class LaporanController extends Controller
{
    public function laporanKantinView()
    {
        $title = 'Laporan Kantin';

        return view('Admin.laporan.laporan-kantin',compact('title'));
    }

    public function laporanKantinLihatData(Request $request)
    {
        // $title       = 'Laporan Kantin Lihat Data';
        $id_kantin   = $request->id_kantin;
        $bulan       = $request->bulan;
        $tahun       = $request->tahun;

        $kantin_nama = Kantin::where('id_kantin',$id_kantin)->firstOrFail()->nama_kantin;

        $title       = 'LAPORAN KANTIN '.strtoupper($kantin_nama).' '.$tahun;

        $kantin      = new SppDetail;

        return view('Admin.laporan.laporan-kantin-lihat-data',compact('title','id_kantin','kantin_nama','bulan','tahun','kantin'));
    }

    public function laporanDataSiswaView()
    {
        $title        = 'Laporan Data Siswa';
        $kelas        = ['X','XI','XII'];
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Admin.laporan.laporan-data-siswa',compact('title','kelas','tahun_ajaran'));
    }

    public function laporanDataSiswaLihatData(Request $request)
    {  
        $kelas           = $request->kelas;
        $id_tahun_ajaran = $request->id_tahun_ajaran;

        $tahun_ajaran    = TahunAjaran::where('id_tahun_ajaran',$id_tahun_ajaran)->firstOrFail()->tahun_ajaran;
        $title           = 'LAPORAN DATA SISWA KELAS '.strtoupper($kelas).' '.$tahun_ajaran;
        $get_kelas       = Kelas::where('slug_kelas','like','%'.$kelas.'-%')->where('status_delete',0)->get();
        $kelas_siswa     = new KelasSiswa;

        return view('Admin.laporan.laporan-data-siswa-lihat-data',compact('title','get_kelas','kelas_siswa','tahun_ajaran'));
    }

    public function laporanTunggakanView()
    {
        $title = 'Laporan Tunggakan';
        $kelas = ['X','XI','XII'];
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Admin.laporan.laporan-tunggakan',compact('title','kelas','tahun_ajaran'));
    }

    public function laporanTunggakanLihatData(Request $request)
    {
        $tahun_ajaran      = $request->tahun_ajaran == "null" ? null : $request->tahun_ajaran;
        $bulan_awal        = $request->bulan_awal == "null" ? null : $request->bulan_awal;
        $tahun_awal        = $request->tahun_awal == "null" ? null : $request->tahun_awal;
        $bulan_akhir       = $request->bulan_akhir == "null" ? null : $request->bulan_akhir;
        $tahun_akhir       = $request->tahun_akhir == "null" ? null : $request->tahun_akhir;
        $kelas_siswa_input = $request->kelas_siswa_input;
        // dd($bulan_awal);

        if ($tahun_ajaran != '') {
            $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_ajaran;
            $explode_tahun_ajaran = explode('/',$tahun_ajaran);
            $bulan_range = null;
        }
        else {
            $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' Dari Bulan '.($bulan_awal).''.$tahun_awal.' Sampai Bulan '.$bulan_akhir.''.$tahun_akhir;
            if ($tahun_awal == $tahun_akhir) {
                $explode_tahun_ajaran = [$tahun_awal];
                // $bulan_range          = [][];
                $bulan_range[0]['bulan_awal']  = (int)$bulan_awal;
                $bulan_range[0]['bulan_akhir'] = (int)$bulan_akhir;
            }
            else {
                $explode_tahun_ajaran = [$tahun_awal,$tahun_akhir];
                $bulan_range[0]['bulan_awal']  = (int)$bulan_awal;
                $bulan_range[0]['bulan_akhir'] = 12;
                $bulan_range[1]['bulan_awal']  = 1;
                $bulan_range[1]['bulan_akhir'] = (int)$bulan_akhir;
            }
        }

        $spp             = new Spp;
        $spp_bulan_tahun = new SppBulanTahun;
        $kolom_spp       = new KolomSpp;
        $spp_detail      = new SppDetail;

        return view('Admin.laporan.laporan-tunggakan-lihat-data',compact('title','bulan_awal','bulan_akhir','tahun_ajaran','kelas_siswa_input','tahun_awal','tahun_akhir','explode_tahun_ajaran','bulan_range','spp','spp_bulan_tahun','kolom_spp','spp_detail'));
    }

    public function laporanPembukuanView()
    {
        $title = 'Laporan Pembukuan';

        return view('Admin.laporan.laporan-pembukuan',compact('title'));
    }

    public function laporanPembukuanLihatData(Request $request)
    {
        $tanggal_awal  = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $title = 'LAPORAN PEMBUKUAN '.human_date($tanggal_awal).' Sampai '.human_date($tanggal_akhir);

        $bulan_tahun_sheets = SppBayar::whereBetween(DB::raw('DATE(created_at)'),[$tanggal_awal,$tanggal_akhir])
                                        ->groupBy(DB::raw('MONTH(created_at)'))
                                        ->orderBy('created_at','ASC')
                                        ->get();

        $spp_bayar_detail = new SppBayarDetail;
        $spp_bayar_data   = new SppBayarData;
        $kolom_spp        = new KolomSpp;

        return view('Admin.laporan.laporan-pembukuan-lihat-data',compact('title','bulan_tahun_sheets','spp_bayar_detail','kolom_spp','spp_bayar_data'));
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
        if ($request->btn_cetak == 'laporan-pembukuan') {
            $this->laporanPembukuan($request);
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
        $tahun_ajaran_input = $request->tahun_ajaran_input;
        $kelas_siswa_input  = $request->kelas_siswa_input;
        $tahun_ajaran       = TahunAjaran::where('id_tahun_ajaran',$tahun_ajaran_input)->firstOrFail()->tahun_ajaran;

        $title    = 'LAPORAN DATA SISWA KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_ajaran;
        $fileName = $title.'.xlsx';

        $get_kelas   = Kelas::where('slug_kelas','like','%'.$kelas_siswa_input.'-%')->where('status_delete',0)->get();
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

            $data_siswa = KelasSiswa::getByIdKelas($tahun_ajaran,$value->id_kelas);
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
            $spreadsheet->getActiveSheet()->setCellValue('B'.$total_cell,KelasSiswa::countByIdKelas($tahun_ajaran,$value->id_kelas));
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
        $bulan_awal        = $request->bulan_awal;
        $tahun_awal        = $request->tahun_awal;
        $bulan_akhir       = $request->bulan_akhir;
        $tahun_akhir       = $request->tahun_akhir;
        $kelas_siswa_input = $request->kelas_siswa_input;

        if ($tahun_ajaran != '') {
            $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_ajaran;
            $explode_tahun_ajaran = explode('/',$tahun_ajaran);
        }
        else {
            $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' Dari Bulan '.($bulan_awal).''.$tahun_awal.' Sampai Bulan '.$bulan_akhir.''.$tahun_akhir;
            if ($tahun_awal == $tahun_akhir) {
                $explode_tahun_ajaran = [$tahun_awal];
                // $bulan_range          = [][];
                $bulan_range[0]['bulan_awal']  = (int)$bulan_awal;
                $bulan_range[0]['bulan_akhir'] = (int)$bulan_akhir;
            }
            else {
                $explode_tahun_ajaran = [$tahun_awal,$tahun_akhir];
                $bulan_range[0]['bulan_awal']  = (int)$bulan_awal;
                $bulan_range[0]['bulan_akhir'] = 12;
                $bulan_range[1]['bulan_awal']  = 1;
                $bulan_range[1]['bulan_akhir'] = (int)$bulan_akhir;
            }
        }
        
        $fileName = $title.'.xlsx';

        $spreadsheet = new Spreadsheet();

        $index_sheet = 0;
        DB::enableQueryLog();
        foreach ($explode_tahun_ajaran as $key => $value) {
            if ($bulan_awal != '') {
                $sheet_bulan_tahun = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                        ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                        // ->join('spp_bulan_tahun','spp.id_spp','=','spp_bulan_tahun.id_spp')
                                        // ->whereBetween('spp_bulan_tahun.bulan',[$bulan_awal,$bulan_akhir])
                                        ->where('spp_bulan_tahun.bulan','>=',$bulan_range[$key]['bulan_awal'])
                                        ->where('spp_bulan_tahun.bulan','<=',$bulan_range[$key]['bulan_akhir'])
                                        ->where('spp_bulan_tahun.tahun',$explode_tahun_ajaran[$key])
                                        ->where('slug_kelas','like','%'.strtolower($kelas_siswa_input).'-%')
                                        ->distinct()
                                        ->orderByRaw("FIELD(bulan_tahun,'Januari, $explode_tahun_ajaran[$key]','Februari, $explode_tahun_ajaran[$key]','Maret, $explode_tahun_ajaran[$key]','April, $explode_tahun_ajaran[$key]','Mei, $explode_tahun_ajaran[$key]','Juni, $explode_tahun_ajaran[$key]','Juli, $explode_tahun_ajaran[$key]','Agustus, $explode_tahun_ajaran[$key]','September, $explode_tahun_ajaran[$key]','Oktober, $explode_tahun_ajaran[$key]','November, $explode_tahun_ajaran[$key]','Desember, $explode_tahun_ajaran[$key]')")
                                        ->get('bulan_tahun');
            }
            else {
                $sheet_bulan_tahun = Spp::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                        ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                        ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                        ->join('spp_bulan_tahun','spp.id_spp','=','spp_bulan_tahun.id_spp')
                                        ->where('bulan_tahun','like','%'.$explode_tahun_ajaran[$key].'%')
                                        ->where('slug_kelas','like','%'.strtolower($kelas_siswa_input).'-%')
                                        ->where('tahun_ajaran',$tahun_ajaran)
                                        ->distinct()
                                        ->orderByRaw("FIELD(bulan_tahun,'Januari, $explode_tahun_ajaran[$key]','Februari, $explode_tahun_ajaran[$key]','Maret, $explode_tahun_ajaran[$key]','April, $explode_tahun_ajaran[$key]','Mei, $explode_tahun_ajaran[$key]','Juni, $explode_tahun_ajaran[$key]','Juli, $explode_tahun_ajaran[$key]','Agustus, $explode_tahun_ajaran[$key]','September, $explode_tahun_ajaran[$key]','Oktober, $explode_tahun_ajaran[$key]','November, $explode_tahun_ajaran[$key]','Desember, $explode_tahun_ajaran[$key]')")
                                        ->get('bulan_tahun');
            }

            foreach ($sheet_bulan_tahun as $index => $val) {
                $spreadsheet->setActiveSheetIndex($index_sheet)->setTitle($val->bulan_tahun);
                $spreadsheet->getActiveSheet()->setCellValue('A1',strtoupper('Tunggakan SPP'));
                $kelas    = SppBulanTahun::getKelasDistinct($val->bulan_tahun,$kelas_siswa_input,$explode_tahun_ajaran[$key]);
                $cell_row = 3;

                $spreadsheet->getDefaultStyle()->getFont()->setSize('12');

                foreach ($kelas as $no => $data) {
                    $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_row,$data->kelas);
                    $spreadsheet->getActiveSheet()->mergeCells('A'.$cell_row.':B'.$cell_row);

                    $styleArray = ['font'  => [
                                    'bold'  => true,
                                    ]
                                ];

                    $spreadsheet->getActiveSheet()->getStyle('A'.$cell_row.':B'.$cell_row)->applyFromArray($styleArray);
                    $cell_row++;
                    $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_row,strtoupper('No.'));
                    $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_row,strtoupper('Nama'));

                    if ($tahun_ajaran != '') {
                        $distinct_kolom_spp = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                                    ->where('kelas',$data->kelas)
                                                    ->where('tahun_ajaran',$tahun_ajaran)
                                                    ->where('bulan_tahun',$val->bulan_tahun)
                                                    ->distinct()
                                                    ->get('id_kolom_spp');
                        $data_siswa_spp    = SppBulanTahun::getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$tahun_ajaran);
                    }
                    else {
                        $distinct_kolom_spp = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                                    ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                                    ->where('kelas',$data->kelas)
                                                    ->where('spp_bulan_tahun.tahun',$explode_tahun_ajaran[$key])
                                                    ->where('bulan_tahun',$val->bulan_tahun)
                                                    ->distinct()
                                                    ->get('id_kolom_spp');
                        $data_siswa_spp    = SppBulanTahun::getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$explode_tahun_ajaran[$key]);
                    }

                    $column_cell       = 'C';
                    $array_column_cell = ['kolom_spp' => [], 'bayar_spp' => [], 'jumlah' => ''];

                    foreach ($distinct_kolom_spp as $i => $j) {
                        $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_row,strtoupper(KolomSpp::getNamaKolomSpp($j->id_kolom_spp)));
                        array_push($array_column_cell['kolom_spp'],$column_cell);
                        $column_cell++;
                        array_push($array_column_cell['bayar_spp'],$column_cell);
                        $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_row,strtoupper('Bulan'));
                        $column_cell++;
                    }

                    $array_column_cell['jumlah'] = $column_cell;
                    $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_row,strtoupper('Jumlah'));

                    $styleArray = ['font'  => [
                                'bold'  => true,
                            ],
                            'alignment' => [
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                            ]
                        ];

                    $spreadsheet->getActiveSheet()->getStyle('A'.$cell_row.':'.$column_cell.$cell_row)->applyFromArray($styleArray);

                    $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
                    $kelas_cell = $cell_row-1;
                    $spreadsheet->getActiveSheet()->getStyle('A'.$kelas_cell.':'.$column_cell.$cell_row)->applyFromArray($styleTable);

                    $cell_row = $cell_row+1;
                    foreach ($data_siswa_spp as $id_siswa => $data_siswa_spp_) {
                        $no = $id_siswa+1;
                        $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_row,$no);
                        $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_row,$data_siswa_spp_->nama_siswa);

                        for ($j=0; $j < count($array_column_cell['kolom_spp']); $j++) {
                            $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['kolom_spp'][$j].$cell_row,SppDetail::getTunggakanKolomSpp($distinct_kolom_spp[$j]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun));

                            $spreadsheet->getActiveSheet()->getColumnDimension($array_column_cell['kolom_spp'][$j])->setAutoSize(true);

                            $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['bayar_spp'][$j].$cell_row,SppDetail::getTunggakanBulanTahun($distinct_kolom_spp[$j]->id_kolom_spp,$data_siswa_spp_->id_spp_bulan_tahun));

                            $spreadsheet->getActiveSheet()->getColumnDimension($array_column_cell['bayar_spp'][$j])->setAutoSize(true);
                        }
                        $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['jumlah'].$cell_row,'=SUM(C'.$cell_row.':'.$column_cell.$cell_row.')');

                        $spreadsheet->getActiveSheet()->getColumnDimension($column_cell)->setAutoSize(true);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$cell_row.':'.$column_cell.$cell_row)->getFont()->setBold(true);

                        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
                        $spreadsheet->getActiveSheet()->getStyle('A'.$cell_row.':'.$column_cell.$cell_row)->applyFromArray($styleTable);
                        $cell_row++;
                    }

                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('C5:'.$column_cell.$cell_row)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
                    $cell_row = $cell_row+2;
                }
                $spreadsheet->getActiveSheet()->mergeCells('A1:C1');

                $styleArray = ['font'  => [
                            'bold'  => true,
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ]
                    ];

                $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);

                $index_sheet++;
                $spreadsheet->createSheet();
            }
        }
        // $spreadsheet->removeSheetByIndex($index_sheet);
        $spreadsheet->getActiveSheet()->setTitle('Rekap SPP');
        $spreadsheet->getActiveSheet()->setCellValue('A1',strtoupper('Tunggakan SPP Rekap'));
        $kelas_rekap_tunggakan = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                            ->where('slug_kelas','like','%'.$kelas_siswa_input.'-%')
                                            ->where('status_bayar',0)
                                            ->distinct()
                                            ->get('kelas');

        $spreadsheet->getActiveSheet()->setCellValue('A1','Tunggakan SPP');

        $cell_rekap = 3;
        foreach ($kelas_rekap_tunggakan as $key => $value) {
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_rekap,$value->kelas);
            $spreadsheet->getActiveSheet()->mergeCells('A'.$cell_rekap.':B'.$cell_rekap);

            $styleArray = ['font'  => [
                            'bold'  => true,
                            ]
                        ];

            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_rekap.':B'.$cell_rekap)->applyFromArray($styleArray);
            $cell_rekap++;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_rekap,strtoupper('No.'));
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_rekap,strtoupper('Nama'));

            $distinct_kolom_rekap = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                            ->where('kelas',$value->kelas)
                                            ->where('status_bayar',0)
                                            ->distinct()
                                            ->get('id_kolom_spp');

            $column_cell       = 'C';
            $array_column_cell = ['kolom_spp' => [], 'bayar_spp' => [], 'jumlah' => ''];

            foreach ($distinct_kolom_rekap as $i => $j) {
                $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_rekap,strtoupper(KolomSpp::getNamaKolomSpp($j->id_kolom_spp)));
                array_push($array_column_cell['kolom_spp'],$column_cell);
                $column_cell++;
                array_push($array_column_cell['bayar_spp'],$column_cell);
                $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_rekap,strtoupper('Bulan'));
                $column_cell++;
            }

            $array_column_cell['jumlah'] = $column_cell;
            $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_rekap,strtoupper('Jumlah'));

            $styleArray = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                    ]
                ];

            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_rekap.':'.$column_cell.$cell_rekap)->applyFromArray($styleArray);

            $data_siswa_rekap = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                            ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                            ->where('kelas',$value->kelas)
                                            ->where('status_bayar',0)
                                            ->groupBy('kelas_siswa.id_siswa')
                                            ->get();

            $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
            $kelas_cell = $cell_rekap-1;
            $spreadsheet->getActiveSheet()->getStyle('A'.$kelas_cell.':'.$column_cell.$cell_rekap)->applyFromArray($styleTable);

            $cell_rekap = $cell_rekap+1;

            foreach ($data_siswa_rekap as $id_siswa => $data_siswa_rekap_) {
                $no = $id_siswa+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_rekap,$no);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_rekap,$data_siswa_rekap_->nama_siswa);

                for ($j=0; $j < count($array_column_cell['kolom_spp']); $j++) {
                    $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['kolom_spp'][$j].$cell_rekap,SppDetail::getTunggakanNominalRekap($distinct_kolom_rekap[$j]->id_kolom_spp,$data_siswa_rekap_->id_siswa));

                    $spreadsheet->getActiveSheet()->getColumnDimension($array_column_cell['kolom_spp'][$j])->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['bayar_spp'][$j].$cell_rekap,SppDetail::getTunggakanBulanRekap($distinct_kolom_rekap[$j]->id_kolom_spp,$data_siswa_rekap_->id_siswa));

                    $spreadsheet->getActiveSheet()->getColumnDimension($array_column_cell['bayar_spp'][$j])->setAutoSize(true);
                }
                $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['jumlah'].$cell_rekap,'=SUM(C'.$cell_rekap.':'.$column_cell.$cell_rekap.')');

                $spreadsheet->getActiveSheet()->getColumnDimension($column_cell)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getStyle('A'.$cell_rekap.':'.$column_cell.$cell_rekap)->getFont()->setBold(true);

                $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
                $spreadsheet->getActiveSheet()->getStyle('A'.$cell_rekap.':'.$column_cell.$cell_rekap)->applyFromArray($styleTable);
                $cell_rekap++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

            $spreadsheet->getActiveSheet()->getStyle('C5:'.$column_cell.$cell_rekap)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
            $cell_rekap = $cell_rekap+2;

        }


        $spreadsheet->setActiveSheetIndex(0);
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanPembukuan(Request $request)
    {
        $tanggal_awal  = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $title    = 'LAPORAN PEMBUKUAN '.human_date($tanggal_awal).' Sampai '.human_date($tanggal_akhir);
        $fileName = $title.'.xlsx';

        $bulan_tahun_sheets = SppBayar::whereBetween(DB::raw('DATE(created_at)'),[$tanggal_awal,$tanggal_akhir])
                                        ->groupBy(DB::raw('MONTH(created_at)'))
                                        ->orderBy('created_at','ASC')
                                        ->get();

        $spreadsheet = new Spreadsheet();

        foreach ($bulan_tahun_sheets as $key => $value) {
            $explode_created_at = explode(' ',$value->created_at);
            $explode_tanggal    = explode('-',$explode_created_at[0]);
            $title_sheets       = strtoupper(bulan_tahun_excel_numeric($explode_tanggal[1],$explode_tanggal[0]));
            $kolom_bayar = SppBayarDetail::join('spp_bayar','spp_bayar_detail.id_spp_bayar','=','spp_bayar.id_spp_bayar')
                                        ->whereMonth('spp_bayar.created_at',$explode_tanggal[1])
                                        ->whereYear('spp_bayar.created_at',$explode_tanggal[0])
                                        ->groupBy('id_kolom_spp')
                                        ->get();
            $cell_num = 3;
            $spreadsheet->setActiveSheetIndex($key)->setTitle($title_sheets);
            $spreadsheet->getActiveSheet()->setCellValue('A1',strtoupper('PENERIMAAN BULAN '.month($explode_tanggal[1]).' '.$explode_tanggal[0]));

            $spreadsheet->getActiveSheet()->setCellValue("A$cell_num",'NO.');
            $spreadsheet->getActiveSheet()->setCellValue("B$cell_num",'TANGGAL');
            $spreadsheet->getActiveSheet()->setCellValue("C$cell_num",'URAIAN');
            $spreadsheet->getActiveSheet()->setCellValue("D$cell_num",'DEBIT');
            $column_cell       = 'E';
            $array_column_cell = ['kolom_spp' => [], 'jumlah' => ''];

            foreach ($kolom_bayar as $i => $j) {
                $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_num,strtoupper(KolomSpp::getNamaKolomSpp($j->id_kolom_spp)));
                array_push($array_column_cell['kolom_spp'],$column_cell);
                $column_cell++;
            }

            $spreadsheet->getActiveSheet()->mergeCells('A1:'.$column_cell.'1');

            $styleHeader = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                    ]
                ];

            $spreadsheet->getActiveSheet()->getStyle('A1:'.$column_cell.'1')->applyFromArray($styleHeader);
            
            $array_column_cell['jumlah'] = $column_cell;

            $styleArray = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                    ],
                    'borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]
                ];

            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_num.':'.$column_cell.$cell_num)->applyFromArray($styleArray);
            $spreadsheet->getActiveSheet()->setCellValue($column_cell.$cell_num,strtoupper('Jumlah'));

            // $siswa_bayar = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
            //     ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
            //     ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
            //     ->whereMonth('spp_bayar.created_at',$explode_tanggal[1])
            //     ->whereYear('spp_bayar.created_at',$explode_tanggal[0])
            //     ->groupBy('kelas_siswa.id_siswa')
            //     ->get();

            $cell_num = $cell_num + 1;
            // foreach ($siswa_bayar as $data) {
                $data_pembayaran_spp = SppBayarData::join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                ->whereMonth('spp_bayar_data.created_at',$explode_tanggal[1])
                ->whereYear('spp_bayar_data.created_at',$explode_tanggal[0])
                // ->where('kelas_siswa.id_siswa',$data->id_siswa)
                ->get();
                foreach ($data_pembayaran_spp as $no => $val) {
                    $number = $no+1;
                    $spreadsheet->getActiveSheet()->setCellValue("A$cell_num",$number);
                    $spreadsheet->getActiveSheet()->setCellValue("B$cell_num",date_excel($val->tanggal_bayar));
                    $spreadsheet->getActiveSheet()->setCellValue("C$cell_num",$val->nama_siswa.' '.$val->keterangan_bayar_spp);
                    $spreadsheet->getActiveSheet()->setCellValue("D$cell_num",$val->nominal_bayar);

                    for ($j=0; $j < count($array_column_cell['kolom_spp']); $j++) {
                        // dd($kolom_bayar[$j]->id_kolom_spp);
                        $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['kolom_spp'][$j].$cell_num,SppBayarDetail::getNominalBayar($kolom_bayar[$j]->id_kolom_spp,$val->id_siswa,$val->id_spp_bayar_data));

                        $spreadsheet->getActiveSheet()->getColumnDimension($array_column_cell['kolom_spp'][$j])->setAutoSize(true);
                    }
                    $spreadsheet->getActiveSheet()->setCellValue($array_column_cell['jumlah'].$cell_num,'=SUM(E'.$cell_num.':'.$column_cell.$cell_num.')');

                    $spreadsheet->getActiveSheet()->getColumnDimension($column_cell)->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$cell_num.':'.$column_cell.$cell_num)->getFont()->setBold(true);

                    $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
                    $spreadsheet->getActiveSheet()->getStyle('A'.$cell_num.':'.$column_cell.$cell_num)->applyFromArray($styleTable);
                    $cell_num++;
                }
            // }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

            $spreadsheet->getActiveSheet()->getStyle('D4:'.$column_cell.$cell_num)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
            $spreadsheet->createSheet();
        }
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanRab(Request $request)
    {

        $id_rincian_pengeluaran__ = $request->id_rincian_pengeluaran;
        $rincian_pengeluaran_row  = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                                    ->firstOrFail();

        $bulan_laporan   = $rincian_pengeluaran_row->bulan_laporan;
        $tahun_laporan   = $rincian_pengeluaran_row->tahun_laporan;
        $bulan_pengajuan = $rincian_pengeluaran_row->bulan_pengajuan;
        $tahun_pengajuan = $rincian_pengeluaran_row->tahun_pengajuan;

        $title    = 'LAPORAN RAB '.month($bulan_laporan).' '.$tahun_laporan.' PENGAJUAN '.month($bulan_pengajuan).' '.$tahun_pengajuan;
        $fileName = $title.'.xlsx';

        $saldo_awal = RincianPengeluaran::where('bulan_laporan',$bulan_laporan)
                                        ->where('tahun_laporan',$tahun_laporan)
                                        ->where('bulan_pengajuan',$bulan_pengajuan)
                                        ->where('tahun_pengajuan',$tahun_pengajuan)
                                        ->firstOrFail()->saldo_awal;

        $get_rincian_detail = RincianPengeluaranDetail::leftJoin('rincian_pengeluaran','rincian_pengeluaran_detail.id_rincian_pengeluaran','=','rincian_pengeluaran.id_rincian_pengeluaran')
                                                    ->leftJoin('kolom_spp','rincian_pengeluaran_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                                    ->where('bulan_laporan',$bulan_laporan)
                                                    ->where('tahun_laporan',$tahun_laporan)
                                                    ->where('bulan_pengajuan',$bulan_pengajuan)
                                                    ->where('tahun_pengajuan',$tahun_pengajuan)
                                                    ->get();

        $akumulasi_uang_makan = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                            ->whereMonth('tanggal_bayar',zero_front_number($bulan_laporan))
                                            ->whereYear('tanggal_bayar',$tahun_laporan)
                                            ->where('slug_kolom_spp','like','%uang-makan%')
                                            ->sum('nominal_bayar');

        $spreadsheet = new Spreadsheet();
        for ($i=0; $i < 6; $i++) {
            $spreadsheet->createSheet();
        }

        $spreadsheet->setActiveSheetIndex(0)->setTitle('PEMBELANJAAN UM');
        $spreadsheet->setActiveSheetIndex(1)->setTitle('PEMBELANJAAN');
        $spreadsheet->setActiveSheetIndex(2)->setTitle('Sheet4');
        $spreadsheet->setActiveSheetIndex(3)->setTitle('PENERIMAAN');
        $spreadsheet->setActiveSheetIndex(4)->setTitle('RINCIAN PENGAJUAN');
        $spreadsheet->setActiveSheetIndex(5)->setTitle('BON PENGAJUAN');
        $spreadsheet->setActiveSheetIndex(6)->setTitle('sapras');

        $spreadsheet->setActiveSheetIndex(2);
        $spreadsheet->getActiveSheet()->setCellValue('A1','SALDO AWAL');
        $spreadsheet->getActiveSheet()->setCellValue('E1',$saldo_awal);
        $spreadsheet->getActiveSheet()->setCellValue('A2','PENGELUARAN');
        $spreadsheet->getActiveSheet()->setCellValue('F2','Akumulasi Uang Makan');
        $spreadsheet->getActiveSheet()->setCellValue('G2',$akumulasi_uang_makan);
        $spreadsheet->getActiveSheet()->setCellValue('A3','Tgl');
        $spreadsheet->getActiveSheet()->setCellValue('B3','Uraian');
        $spreadsheet->getActiveSheet()->setCellValue('E3','Nominal');
        $spreadsheet->getActiveSheet()->setCellValue('F3','PENDAPATAN');
        $spreadsheet->getActiveSheet()->setCellValue('G3','Nominal');
        $spreadsheet->getActiveSheet()->setCellValue('H3','RAB');
        $spreadsheet->getActiveSheet()->setCellValue('K3','Nominal');

        $cell_no             = 4;
        $sheet_4_data[]      = [];
        $sheet_4_pengajuan[] = [];

        foreach ($get_rincian_detail as $key => $value) {
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_no,date_excel($value->tanggal_rincian));
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_no,$value->uraian_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_no,$value->volume_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_no,$value->nominal_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_no,$value->volume_rincian * $value->nominal_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_no,$value->nama_kolom_spp);
            $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_no,$value->nominal_pendapatan_spp);
            $spreadsheet->getActiveSheet()->setCellValue('H'.$cell_no,$value->uraian_rab);
            $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_no,$value->volume_rab);
            $spreadsheet->getActiveSheet()->setCellValue('J'.$cell_no,$value->nominal_rab);
            $spreadsheet->getActiveSheet()->setCellValue('K'.$cell_no,$value->volume_rab * $value->nominal_rab);

            $sheet_4_data[$value->id_rincian_pengeluaran_detail] = [
                'tanggal_rincian' => '=Sheet4!A'.$cell_no,
                'uraian_rincian'  => '=Sheet4!B'.$cell_no,
                'volume_rincian'  => '=Sheet4!C'.$cell_no,
                'nominal_rincian' => '=Sheet4!D'.$cell_no
            ];
            if ($value->uraian_rab != '') {
                $sheet_4_pengajuan[$value->id_rincian_pengeluaran_detail] = [
                    'tanggal_rincian' => '=Sheet4!A'.$cell_no,
                    'uraian_rab'      => '=Sheet4!H'.$cell_no,
                    'volume_rab'      => '=Sheet4!I'.$cell_no,
                    'nominal_rab'     => '=Sheet4!J'.$cell_no
                ];
            }
            $cell_no++;
        }
        $cell_total       = $cell_no+1;
        $cell_grand_total = $cell_total+1;

        $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_total,'Total');
        $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_total,'=SUM(E4:E'.$cell_total.')');
        $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_total,'Total');
        $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_total,'=SUM(G4:G'.$cell_total.')');

        $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_grand_total,'Sisa Uang');
        $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_grand_total,'=E1-E'.$cell_total);
        $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_grand_total,'=G'.$cell_total.'+E'.$cell_grand_total);

        $spreadsheet->getActiveSheet()->getStyle('E1:G2')->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        $spreadsheet->getActiveSheet()->getStyle('D4:D'.$cell_grand_total)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        $spreadsheet->getActiveSheet()->getStyle('E4:E'.$cell_grand_total)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        $spreadsheet->getActiveSheet()->getStyle('G4:G'.$cell_grand_total)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        $spreadsheet->getActiveSheet()->getStyle('J4:J'.$cell_grand_total)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        $spreadsheet->getActiveSheet()->getStyle('K4:K'.$cell_grand_total)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        
        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A3:K'.$cell_no)->applyFromArray($styleTable);
        $spreadsheet->getActiveSheet()->getStyle('A'.$cell_total.':G'.$cell_grand_total)->applyFromArray($styleTable);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
        $spreadsheet->getActiveSheet()->setCellValue('A9','LAPORAN PEMBELANJAAN SMA BUDI LUHUR SAMARINDA');
        $spreadsheet->getActiveSheet()->setCellValue('A10','TAHUN PELAJARAN '.$rincian_pengeluaran_row->tahun_ajaran);
        $spreadsheet->getActiveSheet()->setCellValue('A11',month($bulan_laporan).' '.$tahun_laporan);
        $spreadsheet->getActiveSheet()->setCellValue('A14','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B14','Tgl');
        $spreadsheet->getActiveSheet()->setCellValue('C14','Uraian');
        $spreadsheet->getActiveSheet()->setCellValue('D14','Biaya Satuan');
        $spreadsheet->getActiveSheet()->setCellValue('D15','Volume');
        $spreadsheet->getActiveSheet()->mergeCells('D15:E15');
        $spreadsheet->getActiveSheet()->setCellValue('F15','Harga');
        $spreadsheet->getActiveSheet()->mergeCells('F15:G15');
        $spreadsheet->getActiveSheet()->mergeCells('D14:G14');
        $spreadsheet->getActiveSheet()->setCellValue('H14','MASUK');
        $spreadsheet->getActiveSheet()->setCellValue('I14','KELUAR');
        $spreadsheet->getActiveSheet()->setCellValue('J14','Keterangan Saldo');
        $spreadsheet->getActiveSheet()->mergeCells('A14:A15');
        $spreadsheet->getActiveSheet()->mergeCells('B14:B15');
        $spreadsheet->getActiveSheet()->mergeCells('C14:C15');
        $spreadsheet->getActiveSheet()->mergeCells('H14:H15');
        $spreadsheet->getActiveSheet()->mergeCells('I14:I15');
        $spreadsheet->getActiveSheet()->mergeCells('J14:J15');
        $spreadsheet->getActiveSheet()->mergeCells('A9:J9');
        $spreadsheet->getActiveSheet()->mergeCells('A10:J10');
        $spreadsheet->getActiveSheet()->mergeCells('A11:J11');

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle('A9:J15')->applyFromArray($styleArray);

        $kategori_pembelanjaan = RincianPembelanjaan::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                                    ->where('jenis_rincian_pembelanjaan','operasional')
                                                    ->groupBy('kategori_rincian_pembelanjaan')
                                                    ->get();
        $spreadsheet->getActiveSheet()->setCellValue('C16','Bon Ke Yayasan');
        $spreadsheet->getActiveSheet()->setCellValue('H16','=Sheet4!E1');
        $cell_pembelanjaan  = 17;
        $cell_awal          = 0;
        $jumlah_uang_keluar = '';

        foreach ($kategori_pembelanjaan as $key => $value) {
            $no = $key+1;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan,$no.'.');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pembelanjaan,$value->kategori_rincian_pembelanjaan);
            $pembelanjaan = RincianPembelanjaan::where('kategori_rincian_pembelanjaan',$value->kategori_rincian_pembelanjaan)
                                                ->get();
            $spreadsheet->getActiveSheet()->mergeCells("B$cell_pembelanjaan:C$cell_pembelanjaan");

            $styleArray = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ];

            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan")->applyFromArray($styleArray);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan:B$cell_pembelanjaan")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan:B$cell_pembelanjaan")->getFont()->setBold(true);

            $cell_pembelanjaan++;
            $cell_awal       = $cell_pembelanjaan;
            $jumlah_kategori = 0;

            foreach ($pembelanjaan as $j => $val) {
                $no__ = $j+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan,$no__);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pembelanjaan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['tanggal_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_pembelanjaan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['uraian_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_pembelanjaan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['volume_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_pembelanjaan,'x');
                $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_pembelanjaan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['nominal_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan,"=D$cell_pembelanjaan*G$cell_pembelanjaan");
                $jumlah_kategori = $jumlah_kategori+1;
                $cell_pembelanjaan++;
            }
            $cell_pembelanjaan++;
            
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_pembelanjaan,'Jumlah - '.$jumlah_kategori);
            $spreadsheet->getActiveSheet()->getStyle('C'.$cell_pembelanjaan)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan,"=SUM(I$cell_awal:I$cell_pembelanjaan)");
            if ($jumlah_uang_keluar == '') {
                $jumlah_uang_keluar = "=I$cell_pembelanjaan";
            }
            else {
                $jumlah_uang_keluar.="+I$cell_pembelanjaan";
            }
            $jumlah_kategori = 0;

            $cell_pembelanjaan++;
        }
        $cell_pembelanjaan++;
        $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan,'Total');
        $spreadsheet->getActiveSheet()->mergeCells("A$cell_pembelanjaan:G$cell_pembelanjaan");
        $spreadsheet->getActiveSheet()->setCellValue('H'.$cell_pembelanjaan,'=H16');
        $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan,$jumlah_uang_keluar);
        $spreadsheet->getActiveSheet()->setCellValue('J'.$cell_pembelanjaan,"=H$cell_pembelanjaan-I$cell_pembelanjaan");
        $spreadsheet->getActiveSheet()->getStyle('G16:J'.$cell_pembelanjaan)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        
        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A14:J'.$cell_pembelanjaan)->applyFromArray($styleTable);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(7);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan:G$cell_pembelanjaan")->applyFromArray($styleArray);

        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
        $spreadsheet->getActiveSheet()->setCellValue('A9','LAPORAN PEMBELANJAAN SMA BUDI LUHUR SAMARINDA');
        $spreadsheet->getActiveSheet()->setCellValue('A10','TAHUN PELAJARAN '.$rincian_pengeluaran_row->tahun_ajaran);
        $spreadsheet->getActiveSheet()->setCellValue('A11',month($bulan_laporan).' '.$tahun_laporan);
        $spreadsheet->getActiveSheet()->setCellValue('A14','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B14','Tgl');
        $spreadsheet->getActiveSheet()->setCellValue('C14','Uraian');
        $spreadsheet->getActiveSheet()->setCellValue('D14','Biaya Satuan');
        $spreadsheet->getActiveSheet()->setCellValue('D15','Volume');
        $spreadsheet->getActiveSheet()->mergeCells('D15:E15');
        $spreadsheet->getActiveSheet()->setCellValue('F15','Harga');
        $spreadsheet->getActiveSheet()->mergeCells('F15:G15');
        $spreadsheet->getActiveSheet()->mergeCells('D14:G14');
        $spreadsheet->getActiveSheet()->setCellValue('H14','MASUK');
        $spreadsheet->getActiveSheet()->setCellValue('I14','KELUAR');
        $spreadsheet->getActiveSheet()->setCellValue('J14','Keterangan Saldo');
        $spreadsheet->getActiveSheet()->mergeCells('A14:A15');
        $spreadsheet->getActiveSheet()->mergeCells('B14:B15');
        $spreadsheet->getActiveSheet()->mergeCells('C14:C15');
        $spreadsheet->getActiveSheet()->mergeCells('H14:H15');
        $spreadsheet->getActiveSheet()->mergeCells('I14:I15');
        $spreadsheet->getActiveSheet()->mergeCells('J14:J15');
        $spreadsheet->getActiveSheet()->mergeCells('A9:J9');
        $spreadsheet->getActiveSheet()->mergeCells('A10:J10');
        $spreadsheet->getActiveSheet()->mergeCells('A11:J11');

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle('A9:J15')->applyFromArray($styleArray);

        $kategori_pembelanjaan_uang_makan = RincianPembelanjaan::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                                    ->where('jenis_rincian_pembelanjaan','uang-makan')
                                                    ->groupBy('kategori_rincian_pembelanjaan')
                                                    ->get();
        $spreadsheet->getActiveSheet()->setCellValue('C16','Pemasukan Uang Makan');
        $spreadsheet->getActiveSheet()->setCellValue('H16','=Sheet4!G2');
        $cell_pembelanjaan_uang_makan  = 17;
        $cell_awal_uang_makan          = 0;
        $jumlah_uang_keluar_uang_makan = '';

        foreach ($kategori_pembelanjaan_uang_makan as $key => $value) {
            $no = $key+1;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan_uang_makan,$no.'.');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pembelanjaan_uang_makan,$value->kategori_rincian_pembelanjaan);
            $pembelanjaan = RincianPembelanjaan::where('kategori_rincian_pembelanjaan',$value->kategori_rincian_pembelanjaan)
                                                ->get();
            $spreadsheet->getActiveSheet()->mergeCells("B$cell_pembelanjaan_uang_makan:C$cell_pembelanjaan_uang_makan");

            $styleArray = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ];

            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan_uang_makan")->applyFromArray($styleArray);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan_uang_makan:B$cell_pembelanjaan_uang_makan")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan_uang_makan:B$cell_pembelanjaan_uang_makan")->getFont()->setBold(true);

            $cell_pembelanjaan_uang_makan++;
            $cell_awal_uang_makan       = $cell_pembelanjaan_uang_makan;
            $jumlah_kategori = 0;

            foreach ($pembelanjaan as $j => $val) {
                $no__ = $j+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan_uang_makan,$no__);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pembelanjaan_uang_makan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['tanggal_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_pembelanjaan_uang_makan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['uraian_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_pembelanjaan_uang_makan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['volume_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_pembelanjaan_uang_makan,'x');
                $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_pembelanjaan_uang_makan,$sheet_4_data[$val->id_rincian_pengeluaran_detail]['nominal_rincian']);
                $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan_uang_makan,"=D$cell_pembelanjaan_uang_makan*G$cell_pembelanjaan_uang_makan");
                $jumlah_kategori = $jumlah_kategori+1;
                $cell_pembelanjaan_uang_makan++;
            }
            $cell_pembelanjaan_uang_makan++;
            
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_pembelanjaan_uang_makan,'Jumlah - '.$jumlah_kategori);
            $spreadsheet->getActiveSheet()->getStyle('C'.$cell_pembelanjaan_uang_makan)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan_uang_makan,"=SUM(I$cell_awal_uang_makan:I$cell_pembelanjaan_uang_makan)");
            if ($jumlah_uang_keluar_uang_makan == '') {
                $jumlah_uang_keluar_uang_makan = "=I$cell_pembelanjaan_uang_makan";
            }
            else {
                $jumlah_uang_keluar_uang_makan.="+I$cell_pembelanjaan_uang_makan";
            }
            $jumlah_kategori = 0;
            
            $cell_pembelanjaan_uang_makan++;
        }
        $cell_pembelanjaan_uang_makan++;
        $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pembelanjaan_uang_makan,'Total');
        $spreadsheet->getActiveSheet()->mergeCells("A$cell_pembelanjaan_uang_makan:G$cell_pembelanjaan_uang_makan");
        $spreadsheet->getActiveSheet()->setCellValue('H'.$cell_pembelanjaan_uang_makan,'=H16');
        $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_pembelanjaan_uang_makan,$jumlah_uang_keluar_uang_makan);
        $spreadsheet->getActiveSheet()->setCellValue('J'.$cell_pembelanjaan_uang_makan,"=H$cell_pembelanjaan_uang_makan-I$cell_pembelanjaan_uang_makan");
        $spreadsheet->getActiveSheet()->getStyle('G16:J'.$cell_pembelanjaan_uang_makan)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        
        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A14:J'.$cell_pembelanjaan_uang_makan)->applyFromArray($styleTable);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(7);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(2);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle("A$cell_pembelanjaan_uang_makan:G$cell_pembelanjaan_uang_makan")->applyFromArray($styleArray);

        $spreadsheet->setActiveSheetIndex(4);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
        $spreadsheet->getActiveSheet()->setCellValue('A9','LAPORAN PENGAJUAN SMA BUDI LUHUR SAMARINDA');
        $spreadsheet->getActiveSheet()->setCellValue('A10','TAHUN PELAJARAN '.$rincian_pengeluaran_row->tahun_ajaran);
        $spreadsheet->getActiveSheet()->setCellValue('A11',month($bulan_laporan).' '.$tahun_laporan);
        $spreadsheet->getActiveSheet()->setCellValue('A14','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B14','Uraian');
        $spreadsheet->getActiveSheet()->setCellValue('C14','Biaya Satuan');
        $spreadsheet->getActiveSheet()->setCellValue('C15','Volume');
        $spreadsheet->getActiveSheet()->setCellValue('D15','Harga');
        $spreadsheet->getActiveSheet()->mergeCells('C14:D14');
        $spreadsheet->getActiveSheet()->setCellValue('E14','Nominal');
        $spreadsheet->getActiveSheet()->setCellValue('F14','Total');
        $spreadsheet->getActiveSheet()->mergeCells('A14:A15');
        $spreadsheet->getActiveSheet()->mergeCells('B14:B15');
        $spreadsheet->getActiveSheet()->mergeCells('E14:E15');
        $spreadsheet->getActiveSheet()->mergeCells('F14:F15');
        $spreadsheet->getActiveSheet()->mergeCells('A9:F9');
        $spreadsheet->getActiveSheet()->mergeCells('A10:F10');
        $spreadsheet->getActiveSheet()->mergeCells('A11:F11');

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle('A9:F15')->applyFromArray($styleArray);

        $kategori_pengajuan = RincianPengajuan::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                                    ->groupBy('kategori_rincian_pengajuan')
                                                    ->get();
        $spreadsheet->getActiveSheet()->setCellValue('B16','BELANJA / PENGELUARAN');

        // $spreadsheet->getActiveSheet()->setCellValue('H16','=Sheet4!E1');
        $cell_pengajuan           = 17;
        $cell_awal                = 0;
        $jumlah_total_belanja     = '';
        $rincian_pengajuan_data[] = [];

        foreach ($kategori_pengajuan as $key => $value) {
            $no = $key+1;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pengajuan,$no.'.');
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pengajuan,$value->kategori_rincian_pengajuan);
            $rincian_pengajuan_data[$value->kategori_rincian_pengajuan ] = ['nama_kategori' => "='RINCIAN PENGAJUAN'!B$cell_pengajuan",'jumlah' => ''];
            $pengajuan = RincianPengajuan::where('kategori_rincian_pengajuan',$value->kategori_rincian_pengajuan)
                                                ->get();
            // $spreadsheet->getActiveSheet()->mergeCells("B$cell_pengajuan:C$cell_pengajuan");

            $styleArray = ['font'  => [
                        'bold'  => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ];

            $spreadsheet->getActiveSheet()->getStyle("A$cell_pengajuan")->applyFromArray($styleArray);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pengajuan:B$cell_pengajuan")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $spreadsheet->getActiveSheet()->getStyle("A$cell_pengajuan:B$cell_pengajuan")->getFont()->setBold(true);

            $cell_pengajuan++;
            $cell_awal       = $cell_pengajuan;
            $jumlah_kategori = 0;

            foreach ($pengajuan as $j => $val) {
                $no__ = $j+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_pengajuan,$no__);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pengajuan,$sheet_4_pengajuan[$val->id_rincian_pengeluaran_detail]['uraian_rab']);
                $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_pengajuan,$sheet_4_pengajuan[$val->id_rincian_pengeluaran_detail]['volume_rab']);
                $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_pengajuan,$sheet_4_pengajuan[$val->id_rincian_pengeluaran_detail]['nominal_rab']);
                $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_pengajuan,"=C$cell_pengajuan*D$cell_pengajuan");
                $jumlah_kategori = $jumlah_kategori+1;
                $cell_pengajuan++;
            }
            $cell_pengajuan++;
            
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pengajuan,'Jumlah '.$value->kategori_rincian_pengajuan.' : ');
            $spreadsheet->getActiveSheet()->getStyle('B'.$cell_pengajuan)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_pengajuan,"=SUM(E$cell_awal:E$cell_pengajuan)");
            $rincian_pengajuan_data[$value->kategori_rincian_pengajuan ]['jumlah'] = "='RINCIAN PENGAJUAN'!F$cell_pengajuan";
            if ($jumlah_total_belanja == '') {
                $jumlah_total_belanja = "=F$cell_pengajuan";
            }
            else {
                $jumlah_total_belanja.="+F$cell_pengajuan";
            }
            $jumlah_kategori = 0;

            $cell_pengajuan++;
            $cell_pengajuan++;
        }
        $cell_pengajuan++;
        $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_pengajuan,'JUMLAH BELANJA');
        $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_pengajuan,$jumlah_total_belanja);
        $spreadsheet->getActiveSheet()->getStyle('D18:F'.$cell_pengajuan)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
        
        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A14:F'.$cell_pengajuan)->applyFromArray($styleTable);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle("A$cell_pengajuan:G$cell_pengajuan")->applyFromArray($styleArray);

        $spreadsheet->setActiveSheetIndex(5);
        $spreadsheet->getDefaultStyle()->getFont()->setSize(14);
        $spreadsheet->getActiveSheet()->setCellValue('A9','RINCIAN PENGAJUAN SMA BUDI LUHUR SAMARINDA');
        $spreadsheet->getActiveSheet()->setCellValue('A10','TAHUN PELAJARAN '.$rincian_pengeluaran_row->tahun_ajaran);
        $spreadsheet->getActiveSheet()->setCellValue('A11',month($bulan_laporan).' '.$tahun_laporan);
        $spreadsheet->getActiveSheet()->setCellValue('A13','NO');
        $spreadsheet->getActiveSheet()->setCellValue('B13','BELANJA / PENGELUARAN');
        $spreadsheet->getActiveSheet()->setCellValue('C13','JUMLAH');
        $spreadsheet->getActiveSheet()->mergeCells('A9:C9');
        $spreadsheet->getActiveSheet()->mergeCells('A10:C10');
        $spreadsheet->getActiveSheet()->mergeCells('A11:C11');

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle('A9:C13')->applyFromArray($styleArray);

        $kategori_pengajuan__ = RincianPengajuan::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                                    ->groupBy('kategori_rincian_pengajuan')
                                                    ->get();

        $cell_bon_pengajuan = 14;
        foreach ($kategori_pengajuan__ as $key => $value) {
            $no = $key+1;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_bon_pengajuan,$no);
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_bon_pengajuan,$rincian_pengajuan_data[$value->kategori_rincian_pengajuan]['nama_kategori']);
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_bon_pengajuan,$rincian_pengajuan_data[$value->kategori_rincian_pengajuan]['jumlah']);

            $cell_bon_pengajuan++;
        }
        $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_bon_pengajuan,'JUMLAH PENGAJUAN');
            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_bon_pengajuan)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A'.$cell_bon_pengajuan.':B'.$cell_bon_pengajuan);
        $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_bon_pengajuan,"=SUM(C14:C$cell_bon_pengajuan)");
        $spreadsheet->getActiveSheet()->getStyle('C14:C'.$cell_bon_pengajuan)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');

        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A13:C'.$cell_bon_pengajuan)->applyFromArray($styleTable);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        $spreadsheet->setActiveSheetIndex(6);
        $spreadsheet->getActiveSheet()->setCellValue('A1','NO.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NAMA BARANG');
        $spreadsheet->getActiveSheet()->setCellValue('C1','QTY');
        $spreadsheet->getActiveSheet()->setCellValue('D1','KET');
        $spreadsheet->getActiveSheet()->setCellValue('E1','HARGA BARANG');
        $spreadsheet->getActiveSheet()->setCellValue('F1','JUMLAH');
        $spreadsheet->getActiveSheet()->mergeCells('A1:A2');
        $spreadsheet->getActiveSheet()->mergeCells('B1:B2');
        $spreadsheet->getActiveSheet()->mergeCells('C1:C2');
        $spreadsheet->getActiveSheet()->mergeCells('D1:D2');
        $spreadsheet->getActiveSheet()->mergeCells('E1:E2');
        $spreadsheet->getActiveSheet()->mergeCells('F1:F2');

        $styleArray = ['font'  => [
                    'bold'  => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]
            ];

        $spreadsheet->getActiveSheet()->getStyle('A1:F2')->applyFromArray($styleArray);

        $kategori_sapras = Sapras::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                ->groupBy('kategori_sapras')
                                ->get();

        $cell_sapras = 3;
        $cell_awal   = 0;
        foreach ($kategori_sapras as $key => $value) {
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_sapras,$value->kategori_sapras);
            $spreadsheet->getActiveSheet()->mergeCells("A$cell_sapras:F$cell_sapras");

            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_sapras)->applyFromArray($styleArray);

            $barang_sapras = Sapras::where('id_rincian_pengeluaran',$id_rincian_pengeluaran__)
                                    ->where('kategori_sapras',$value->kategori_sapras)
                                    ->get();

            $cell_sapras++;
            $cell_awal = $cell_sapras;

            foreach ($barang_sapras as $no => $val) {
                $no__ = $no+1;
                $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_sapras,$no__);
                $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_sapras,$val->nama_barang);
                $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_sapras,$val->qty);
                $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_sapras,$val->ket);
                $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_sapras,$val->harga_barang);
                $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_sapras,"=C$cell_sapras*E$cell_sapras");
                $cell_sapras++;
            }

            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_sapras,'Total Keseluruhan');
            $spreadsheet->getActiveSheet()->mergeCells("A$cell_sapras:E$cell_sapras");
            $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_sapras,"=SUM(F$cell_awal:F$cell_sapras)");
            $spreadsheet->getActiveSheet()->getStyle('A'.$cell_sapras)->applyFromArray($styleArray);

            $cell_sapras++;
        }

        $cell_sapras--;
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('E4:F'.$cell_sapras)->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');

        $styleTable = ['borders'=>['allBorders'=>['borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $spreadsheet->getActiveSheet()->getStyle('A1:F'.$cell_sapras)->applyFromArray($styleTable);

        $spreadsheet->setActiveSheetIndex(2);
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }
}
