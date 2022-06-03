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
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
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

        $get_kelas   = Kelas::where('slug_kelas','like','%'.$kelas_siswa_input.'-%')->get();
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

        $title    = 'LAPORAN TUNGGAKAN KELAS '.strtoupper($kelas_siswa_input).' '.$tahun_ajaran;
        $fileName = $title.'.xlsx';

        $spreadsheet = new Spreadsheet();

        $explode_tahun_ajaran = explode('/',$tahun_ajaran);
        // dd($explode_tahun_ajaran);

        $index_sheet = 0;
        foreach ($explode_tahun_ajaran as $key => $value) {
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

            foreach ($sheet_bulan_tahun as $index => $val) {
                $spreadsheet->setActiveSheetIndex($index_sheet)->setTitle($val->bulan_tahun);
                $spreadsheet->getActiveSheet()->setCellValue('A1',strtoupper('Tunggakan SPP'));
                $kelas    = SppBulanTahun::getKelasDistinct($val->bulan_tahun,$kelas_siswa_input,$tahun_ajaran);
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

                    $column_cell       = 'C';
                    $data_siswa_spp    = SppBulanTahun::getSiswaByTunggakan($val->bulan_tahun,$data->kelas,$tahun_ajaran);
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
        $spreadsheet->removeSheetByIndex($index_sheet);
        $spreadsheet->setActiveSheetIndex(0);
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function laporanRab(Request $request)
    {
        $bulan_laporan   = $request->bulan_laporan;
        $tahun_laporan   = $request->tahun_laporan;
        $bulan_pengajuan = $request->bulan_pengajuan;
        $tahun_pengajuan = $request->tahun_pengajuan;

        $title    = 'LAPORAN RAB '.$bulan_laporan.' '.$tahun_laporan.' PENGAJUAN '.$bulan_pengajuan.' '.$tahun_pengajuan;
        $fileName = $title.'.xlsx';

        $saldo_awal = RincianPengeluaran::where('bulan_laporan',$bulan_laporan)
                                        ->where('tahun_laporan',$tahun_laporan)
                                        ->where('bulan_pengajuan',$bulan_pengajuan)
                                        ->where('tahun_pengajuan',$tahun_pengajuan)
                                        ->firstOrFail()->saldo_awal;

        $get_rincian_detail = RincianPengeluaranDetail::join('rincian_pengeluaran','rincian_pengeluaran_detail.id_rincian_pengeluaran','=','rincian_pengeluaran.id_rincian_pengeluaran')
                                                    ->join('kolom_spp','rincian_pengeluaran_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                                    ->where('bulan_laporan',$bulan_laporan)
                                                    ->where('tahun_laporan',$tahun_laporan)
                                                    ->where('bulan_pengajuan',$bulan_pengajuan)
                                                    ->where('tahun_pengajuan',$tahun_pengajuan)
                                                    ->get();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setCellValue('A1','SALDO AWAL');
        $spreadsheet->getActiveSheet()->setCellValue('E1',$saldo_awal);
        $spreadsheet->getActiveSheet()->setCellValue('A2','PENGELUARAN');
        $spreadsheet->getActiveSheet()->setCellValue('A3','Tgl');
        $spreadsheet->getActiveSheet()->setCellValue('B3','Uraian');
        $spreadsheet->getActiveSheet()->setCellValue('E3','Nominal');
        $spreadsheet->getActiveSheet()->setCellValue('F3','PENDAPATAN');
        $spreadsheet->getActiveSheet()->setCellValue('G3','Nominal');
        $spreadsheet->getActiveSheet()->setCellValue('H3','RAB');
        $spreadsheet->getActiveSheet()->setCellValue('K3','Nominal');

        $cell_no = 4;
        foreach ($get_rincian_detail as $key => $value) {
            $spreadsheet->getActiveSheet()->setCellValue('A'.$cell_no,$value->tanggal_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('B'.$cell_no,$value->uraian_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('C'.$cell_no,$value->volume_rincian);
            $spreadsheet->getActiveSheet()->setCellValue('D'.$cell_no,$value->nominal_pendapatan);
            $spreadsheet->getActiveSheet()->setCellValue('E'.$cell_no,$value->volume_rincian * $value->nominal_pendapatan);
            $spreadsheet->getActiveSheet()->setCellValue('F'.$cell_no,$value->nama_kolom_spp);
            $spreadsheet->getActiveSheet()->setCellValue('G'.$cell_no,$value->nominal_pendapatan_spp);
            $spreadsheet->getActiveSheet()->setCellValue('H'.$cell_no,$value->uraian_rab);
            $spreadsheet->getActiveSheet()->setCellValue('I'.$cell_no,$value->volume_rab);
            $spreadsheet->getActiveSheet()->setCellValue('J'.$cell_no,$value->nominal_rab);
            $spreadsheet->getActiveSheet()->setCellValue('K'.$cell_no,$value->volume_rab * $value->nominal_rab);
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

        $spreadsheet->getActiveSheet()->getStyle('E1')->getNumberFormat()->setFormatCode('"Rp "#,##0.00_-');
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
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }
}
