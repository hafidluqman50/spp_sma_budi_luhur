<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayar;
use App\Models\KelasSiswa;
use App\Models\Kantin;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class SppController extends Controller
{
    public function index()
    {
        $title = 'SPP | Petugas';

        return view('Petugas.spp.main',compact('title'));
    }

    public function tambah()
    {
        $title        = 'Tambah SPP | Petugas';
        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();
        $kantin       = Kantin::where('status_delete',0)->get();

        return view('Petugas.spp.spp-tambah',compact('title','tahun_ajaran','kolom_spp','kelas','kantin'));
    }

    public function save(Request $request)
    {
        // $tanggal_spp = date('Y-m-d');
        // $siswa       = $request->siswa;
        // $kolom_spp   = $request->kolom_spp;
        // $bayar_spp   = $request->nominal_bayar;

        // $data_spp = [
        //     'id_spp'           => $id_spp,
        //     'id_kelas_siswa'   => $siswa,
        //     'total_pembayaran' => 0,
        // ];

        // Spp::firstOrCreate($data_spp);

        // $sum_total_bayar = 0;

        // foreach ($kolom_spp as $key => $value) {
        //     $id_spp_detail = (string)Str::uuid();
        //     $data_spp_detail[] = [
        //         'id_spp_detail' => $id_spp_detail,
        //         'id_spp'        => $id_spp,
        //         'tanggal_bayar' => $tanggal_spp,
        //         'id_kolom_spp'  => $kolom_spp[$key],
        //         'bayar_spp'     => $bayar_spp[$key]
        //     ];
        //     $sum_total_bayar = $sum_total_bayar+$bayar_spp[$key];
        // }

        // SppDetail::insert($data_spp_detail);
        // Spp::where('id_spp',$id_spp)->update(['total_pembayaran' => $sum_total_bayar]);
        // $bulan_tahun = $request->bulan_tahun;
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas        = $request->kelas;
        $siswa        = $request->siswa;
        $bulan        = $request->bulan_spp;
        $tahun        = $request->tahun_spp;
        $bulan_tahun  = $bulan.', '.$tahun;
        $kantin       = $request->kantin;

        $kolom_spp        = $request->kolom_spp;
        $nominal_spp      = $request->nominal_spp;
        $total_pembayaran = array_sum($nominal_spp);

        // CHECK SISWA //
        if (Spp::where('id_kelas_siswa',$siswa)->count() > 0) {
            $id_spp = Spp::where('id_kelas_siswa',$siswa)->firstOrFail()->id_spp;
            $total_harus_bayar_spp = Spp::where('id_spp',$id_spp)->firstOrFail()->total_harus_bayar;
            $data_spp = [
                'total_harus_bayar' => $total_pembayaran + $total_harus_bayar_spp
            ];
            Spp::where('id_spp',$id_spp)->update($data_spp);
        }
        else {
            $id_spp = (string)Str::uuid();
            $data_spp = [
                'id_spp'            => $id_spp,
                'id_kelas_siswa'    => $siswa,
                'total_harus_bayar' => $total_pembayaran
            ];
            Spp::create($data_spp);   
        }
        // END CHECK SISWA //

        $id_spp_bulan_tahun = (string)Str::uuid();
        $data_spp_bulan_tahun = [
            'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
            'id_spp'             => $id_spp,
            'bulan_tahun'        => $bulan_tahun,
            'id_kantin'          => $kantin
        ];

        SppBulanTahun::create($data_spp_bulan_tahun);

        foreach ($kolom_spp as $index => $element) {
            $id_spp_detail = (string)Str::uuid();
            $data_spp_detail = [
                'id_spp_detail'      => $id_spp_detail,
                'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
                'id_kolom_spp'       => $kolom_spp[$index],
                'nominal_spp'        => $nominal_spp[$index],
                'bayar_spp'          => 0,
                'sisa_bayar'         => $nominal_spp[$index],
                'status_bayar'       => 0
            ];

            SppDetail::create($data_spp_detail);
        }

        return redirect('/petugas/spp')->with('message','Berhasil Input Data SPP');
    }

    public function delete($id)
    {
        Spp::where('id_spp',$id)->delete();

        return redirect('/petugas/spp')->with('message','Berhasil Delete Data SPP');
    }

    public function formImport()
    {
        $title = 'Form Import | Petugas';

        return view('Petugas.spp.spp-import',compact('title'));
    }

    public function contohImport()
    {
        $fileName    = 'Contoh Format Import SPP.xlsx';
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize('12');

        $spreadsheet->setActiveSheetIndex(0)->setTitle('SPP');
        $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NISN');
        $spreadsheet->getActiveSheet()->setCellValue('C1','Nama Siswa');
        $spreadsheet->getActiveSheet()->setCellValue('D1','Kelas');
        $spreadsheet->getActiveSheet()->setCellValue('E1','Tahun Ajaran');
        $spreadsheet->getActiveSheet()->setCellValue('F1','Bulan');
        $spreadsheet->getActiveSheet()->setCellValue('G1','Tahun');
        $spreadsheet->getActiveSheet()->setCellValue('H1','Kantin');
        $spreadsheet->getActiveSheet()->setCellValue('I1','SPP');
        $spreadsheet->getActiveSheet()->setCellValue('J1','Nominal SPP');
        $spreadsheet->getActiveSheet()->setCellValue('K1','Nominal Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('L1','Status Bayar');
        // $spreadsheet->getActiveSheet()->setCellValue('L1','Nama Saudara/Keluarga');

        $spreadsheet->getActiveSheet()->setCellValue('A2','1');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E2','2021/2022');
        $spreadsheet->getActiveSheet()->setCellValue('F2','Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('G2','2021');
        $spreadsheet->getActiveSheet()->setCellValue('H2','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->setCellValue('I2','Pembayaran Akademik');
        $spreadsheet->getActiveSheet()->setCellValue('J2','1000000');
        $spreadsheet->getActiveSheet()->setCellValue('K2','0');
        $spreadsheet->getActiveSheet()->setCellValue('L2','belum-lunas');
        $spreadsheet->getActiveSheet()->setCellValue('I3','Pembayaran Gedung');
        $spreadsheet->getActiveSheet()->setCellValue('J3','600000');
        $spreadsheet->getActiveSheet()->setCellValue('K3','0');
        $spreadsheet->getActiveSheet()->setCellValue('L3','belum-lunas');
        $spreadsheet->getActiveSheet()->mergeCells('A2:A3');
        $spreadsheet->getActiveSheet()->mergeCells('B2:B3');
        $spreadsheet->getActiveSheet()->mergeCells('C2:C3');
        $spreadsheet->getActiveSheet()->mergeCells('D2:D3');
        $spreadsheet->getActiveSheet()->mergeCells('E2:E3');
        $spreadsheet->getActiveSheet()->mergeCells('F2:F3');
        $spreadsheet->getActiveSheet()->mergeCells('G2:G3');
        $spreadsheet->getActiveSheet()->mergeCells('H2:H3');

        $spreadsheet->getActiveSheet()->setCellValue('A4','2');
        $spreadsheet->getActiveSheet()->setCellValue('B4','00088899913');
        $spreadsheet->getActiveSheet()->setCellValue('C4','Uchiha Tiara');
        $spreadsheet->getActiveSheet()->setCellValue('D4','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E4','2021/2022');
        $spreadsheet->getActiveSheet()->setCellValue('F4','September');
        $spreadsheet->getActiveSheet()->setCellValue('G4','2021');
        $spreadsheet->getActiveSheet()->setCellValue('H4','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->setCellValue('I4','Pembayaran Akademik');
        $spreadsheet->getActiveSheet()->setCellValue('J4','50000');
        $spreadsheet->getActiveSheet()->setCellValue('K4','50000');
        $spreadsheet->getActiveSheet()->setCellValue('L4','sudah-lunas');
        $spreadsheet->getActiveSheet()->setCellValue('I5','Pembayaran Gedung');
        $spreadsheet->getActiveSheet()->setCellValue('J5','20000');
        $spreadsheet->getActiveSheet()->setCellValue('K5','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L5','belum-lunas');
        $spreadsheet->getActiveSheet()->setCellValue('F6','Oktober');
        $spreadsheet->getActiveSheet()->setCellValue('G6','2021');
        $spreadsheet->getActiveSheet()->setCellValue('H6','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->setCellValue('I6','Pembayaran Fasilitas');
        $spreadsheet->getActiveSheet()->setCellValue('J6','10000');
        $spreadsheet->getActiveSheet()->setCellValue('K6','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L6','sudah-lunas');
        $spreadsheet->getActiveSheet()->mergeCells('A4:A6');
        $spreadsheet->getActiveSheet()->mergeCells('B4:B6');
        $spreadsheet->getActiveSheet()->mergeCells('C4:C6');
        $spreadsheet->getActiveSheet()->mergeCells('D4:D6');
        $spreadsheet->getActiveSheet()->mergeCells('E4:E6');
        $spreadsheet->getActiveSheet()->mergeCells('F4:F5');
        $spreadsheet->getActiveSheet()->mergeCells('G4:G5');
        $spreadsheet->getActiveSheet()->mergeCells('H4:H5');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:K6')->applyFromArray($styleAlignment);
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

        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1)->setTitle('Pembayaran');
        $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NISN');
        $spreadsheet->getActiveSheet()->setCellValue('C1','Nama Siswa');
        $spreadsheet->getActiveSheet()->setCellValue('D1','Kelas');
        $spreadsheet->getActiveSheet()->setCellValue('E1','Tahun Ajaran');
        $spreadsheet->getActiveSheet()->setCellValue('F1','Bulan');
        $spreadsheet->getActiveSheet()->setCellValue('G1','Tahun');
        $spreadsheet->getActiveSheet()->setCellValue('H1','Tanggal Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('I1','Total Biaya');
        $spreadsheet->getActiveSheet()->setCellValue('J1','Total Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('K1','Kembalian');
        $spreadsheet->getActiveSheet()->setCellValue('L1','Keterangan');

        $spreadsheet->getActiveSheet()->setCellValue('A2','1');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E2','2021/2022');
        $spreadsheet->getActiveSheet()->setCellValue('F2','Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('G2','2021');
        $spreadsheet->getActiveSheet()->setCellValue('H2',"'14-08-2021");
        $spreadsheet->getActiveSheet()->setCellValue('I2','50000');
        $spreadsheet->getActiveSheet()->setCellValue('J2','50000');
        $spreadsheet->getActiveSheet()->setCellValue('K2','0');
        $spreadsheet->getActiveSheet()->setCellValue('L2','Pembayaran SPP Bulan Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('H3',"'20-08-2021");
        $spreadsheet->getActiveSheet()->setCellValue('I3','20000');
        $spreadsheet->getActiveSheet()->setCellValue('J3','20000');
        $spreadsheet->getActiveSheet()->setCellValue('K3','0');
        $spreadsheet->getActiveSheet()->setCellValue('L3','Pembayaran Sisa Akademik Agustus 2021');
        $spreadsheet->getActiveSheet()->mergeCells('A2:A3');
        $spreadsheet->getActiveSheet()->mergeCells('B2:B3');
        $spreadsheet->getActiveSheet()->mergeCells('C2:C3');
        $spreadsheet->getActiveSheet()->mergeCells('D2:D3');
        $spreadsheet->getActiveSheet()->mergeCells('E2:E3');
        $spreadsheet->getActiveSheet()->mergeCells('F2:F3');
        $spreadsheet->getActiveSheet()->mergeCells('G2:G3');

        $spreadsheet->getActiveSheet()->setCellValue('A4','2');
        $spreadsheet->getActiveSheet()->setCellValue('B4','00088899913');
        $spreadsheet->getActiveSheet()->setCellValue('C4','Uchiha Tiara');
        $spreadsheet->getActiveSheet()->setCellValue('D4','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E4','2021/2022');
        $spreadsheet->getActiveSheet()->setCellValue('F4','September');
        $spreadsheet->getActiveSheet()->setCellValue('G4','2021');
        $spreadsheet->getActiveSheet()->setCellValue('H4',"'13-09-2021");
        $spreadsheet->getActiveSheet()->setCellValue('I4','50000');
        $spreadsheet->getActiveSheet()->setCellValue('J4','70000');
        $spreadsheet->getActiveSheet()->setCellValue('K4','20000');
        $spreadsheet->getActiveSheet()->setCellValue('L4','Pembayaran Akademik September 2021');
        $spreadsheet->getActiveSheet()->setCellValue('H5',"'15-09-2021");
        $spreadsheet->getActiveSheet()->setCellValue('I5','20000');
        $spreadsheet->getActiveSheet()->setCellValue('J5','30000');
        $spreadsheet->getActiveSheet()->setCellValue('K5','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L5','Pembayaran SPP September 2021');
        $spreadsheet->getActiveSheet()->mergeCells('A4:A4');
        $spreadsheet->getActiveSheet()->mergeCells('B4:B5');
        $spreadsheet->getActiveSheet()->mergeCells('C4:C5');
        $spreadsheet->getActiveSheet()->mergeCells('D4:D5');
        $spreadsheet->getActiveSheet()->mergeCells('E4:E5');
        $spreadsheet->getActiveSheet()->mergeCells('F4:F5');
        $spreadsheet->getActiveSheet()->mergeCells('G4:G5');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:K6')->applyFromArray($styleAlignment);
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
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function import(Request $request)
    {
        $file_import = $request->file_import;

        foreach ($file_import as $key => $value) {
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open($file_import[$key]);

            session()->forget('spp');
            // SHEET 1
            $get_id_kelas_siswa     = '';
            $get_id_spp             = '';
            $get_id_spp_bulan_tahun = '';
            // END SHEET 1

            // SHEET 2 //
            $get_id_kelas_siswa_     = '';
            $get_id_spp_             = '';
            $get_id_spp_bulan_tahun_ = '';
            // END SHEET 2 //
            
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getIndex() === 0) {
                    if (strtoupper($sheet->getName()) == 'SPP') {
                        foreach ($sheet->getRowIterator() as $num => $row) {
                            if ($num > 1) {
                                $cells = $row->getCells();
                                if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                    $check_kelas_siswa = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                    if ($check_kelas_siswa == 'true') {
                                        $get_id_kelas_siswa = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;
                                    }
                                    else {
                                        return redirect('/petugas/spp/import')->with('log','Siswa " '.$cells[2]->getValue().' " pada sheet SPP tidak ditemukan di kelas siswa! Mohon periksa kembali!');
                                    }
                                }
                                else {
                                    $session_id_kelas_siswa = session()->get('spp')['id_kelas_siswa'];
                                }

                                if ($cells[7]->getValue() != '') {
                                    $check_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[7]->getValue(),'-'))
                                                             ->count();
                                    if ($check_kantin == 0) { 
                                        return redirect('/petugas/spp/import')->with('log','Data Kantin " '.$cells[7].' " tidak ditemukan! Mohon cek kembali data kantin');
                                    }
                                }

                                $check_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                         ->count();

                                if ($check_kolom_spp == 0) { 
                                    return redirect('/petugas/spp/import')->with('log','Kolom Spp " '.$cells[8].' " tidak ditemukan! Mohon cek kembali data kolom spp');
                                }

                                if (Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->count() == 0) {

                                    $data_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa,
                                        'total_harus_bayar' => $cells[9]->getValue() - $cells[10]->getValue(),
                                    ];
                                    Spp::firstOrCreate($data_spp);
                                    $get_id_spp = Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->get()[0]->id_spp;

                                }
                                else {
                                    $get_spp    = Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->get()[0];       
                                    $get_id_spp = $get_spp->id_spp;

                                    if ($cells[5]->getValue() == '' && $cells[6]->getValue() == '') {
                                        $cek_data_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)->where('id_spp_bulan_tahun',session()->get('spp')['id_spp_bulan_tahun'])->count();

                                        if ($cek_data_spp_bulan_tahun == 0) {
                                            $data_spp = [
                                                'total_harus_bayar' => $get_spp->total_harus_bayar + ($cells[9]->getValue() - $cells[10]->getValue())
                                            ];
                                            Spp::where('id_spp',$get_spp->id_spp)->update($data_spp);
                                        }
                                        else {
                                            $get_id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                                ->get()[0]->id_kolom_spp;

                                            $row_id_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                                    ->where('id_spp_bulan_tahun',session()->get('spp')['id_spp_bulan_tahun'])
                                                                                   ->get()[0]->id_spp_bulan_tahun;

                                            $cek_spp_kolom_detail = SppDetail::where('id_spp_bulan_tahun',$row_id_spp_bulan_tahun)
                                                                              ->where('id_kolom_spp',$get_id_kolom_spp)
                                                                              ->count();

                                            if ($cek_spp_kolom_detail == 0) {
                                                $data_spp = [
                                                    'total_harus_bayar' => $get_spp->total_harus_bayar + ($cells[9]->getValue() - $cells[10]->getValue())
                                                ];
                                                Spp::where('id_spp',$get_spp->id_spp)->update($data_spp);
                                            }
                                        }
                                    }
                                    else {
                                        $cek_data_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())->count();

                                        if ($cek_data_spp_bulan_tahun == 0) {
                                            $data_spp = [
                                                'total_harus_bayar' => $get_spp->total_harus_bayar + ($cells[9]->getValue() - $cells[10]->getValue())
                                            ];
                                            Spp::where('id_spp',$get_spp->id_spp)->update($data_spp);
                                        }
                                        else {
                                            $get_id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                                ->get()[0]->id_kolom_spp;

                                            $row_id_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())->get()[0]->id_spp_bulan_tahun;

                                            $cek_spp_kolom_detail = SppDetail::where('id_spp_bulan_tahun',$row_id_spp_bulan_tahun)
                                                                              ->where('id_kolom_spp',$get_id_kolom_spp)
                                                                              ->count();

                                            if ($cek_spp_kolom_detail == 0) {
                                                $data_spp = [
                                                    'total_harus_bayar' => $get_spp->total_harus_bayar + ($cells[9]->getValue() - $cells[10]->getValue())
                                                ];
                                                Spp::where('id_spp',$get_spp->id_spp)->update($data_spp);
                                            }
                                        }
                                    }
                                }

                                $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;

                                if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '' && $cells[7]->getValue() != '') {
                                    $count_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                          ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                          ->count();
                                    $id_kantin = Kantin::where('slug_nama_kantin',$cells[7]->getValue())->get()[0]->id_kantin;
                                    if ($count_spp_bulan_tahun == 0) {
                                        $data_spp_bulan_tahun = [
                                            'id_spp'      => $get_id_spp,
                                            'bulan_tahun' => $cells[5]->getValue().', '.$cells[6]->getValue(),
                                            'id_kantin'   => $id_kantin
                                        ];

                                        SppBulanTahun::firstOrCreate($data_spp_bulan_tahun);

                                        $get_id_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                          ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                          ->get()[0]->id_spp_bulan_tahun;
                                    }
                                    else {
                                        $get_id_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                          ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                          ->get()[0]->id_spp_bulan_tahun;
                                    }

                                    $status_bayar = [
                                        'belum-lunas' => 0,
                                        'sudah-lunas' => 1
                                    ];
                                    $data_spp_detail = [
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun,
                                        'id_kolom_spp'       => $id_kolom_spp,
                                        'nominal_spp'        => $cells[9]->getValue(),
                                        'bayar_spp'          => $cells[10]->getValue(),
                                        'sisa_bayar'         => $cells[9]->getValue() - $cells[10]->getValue(),
                                        'status_bayar'       => $status_bayar[$cells[11]->getValue()]
                                    ];
                                }
                                else {
                                    $session_id_spp_bulan_tahun = session()->get('spp')['id_spp_bulan_tahun'];

                                    $status_bayar = [
                                        'belum-lunas' => 0,
                                        'sudah-lunas' => 1
                                    ];
                                    $data_spp_detail = [
                                        'id_spp_bulan_tahun' => $session_id_spp_bulan_tahun,
                                        'id_kolom_spp'       => $id_kolom_spp,
                                        'nominal_spp'        => $cells[9]->getValue(),
                                        'bayar_spp'          => $cells[10]->getValue(),
                                        'sisa_bayar'         => $cells[9]->getValue() - $cells[10]->getValue(),
                                        'status_bayar'       => $status_bayar[$cells[11]->getValue()]
                                    ];
                                }

                                if (SppDetail::where('id_spp_bulan_tahun',$data_spp_detail['id_spp_bulan_tahun'])
                                            ->where('id_kolom_spp',$data_spp_detail['id_kolom_spp'])->count() != 0) {

                                    SppDetail::where('id_spp_bulan_tahun',$data_spp_detail['id_spp_bulan_tahun'])
                                            ->where('id_kolom_spp',$data_spp_detail['id_kolom_spp'])
                                            ->update($data_spp_detail);

                                    $sum_sisa_bayar = SppDetail::where('id_spp_bulan_tahun',$data_spp_detail['id_spp_bulan_tahun'])
                                                                ->where('id_kolom_spp',$data_spp_detail['id_kolom_spp'])
                                                                ->sum('sisa_bayar');
                                }
                                else {
                                    SppDetail::firstOrCreate($data_spp_detail);
                                }

                                $sum_sisa_bayar = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                                        ->where('spp.id_spp',$get_id_spp)
                                                        ->sum('sisa_bayar');

                                Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $sum_sisa_bayar]);

                                if (!session()->has('spp')) {
                                    $session_spp = [
                                        'id_kelas_siswa'     => $get_id_kelas_siswa,
                                        'id_spp'             => $get_id_spp,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun,
                                    ];
                                    session()->put('spp',$session_spp);
                                }
                                if (session()->has('spp') && $get_id_kelas_siswa != '') {
                                    $session_spp = [
                                        'id_kelas_siswa'     => $get_id_kelas_siswa,
                                        'id_spp'             => $get_id_spp,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun,
                                    ];
                                    session()->put('spp',$session_spp);
                                }
                            }
                        }   
                    }
                    else if (strtoupper($sheet->getName()) == 'PEMBAYARAN') {
                        foreach ($sheet->getRowIterator() as $num => $row) {
                            if ($num > 1) {
                                $cells = $row->getCells();
                                if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                    $check_kelas_siswa_ = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                    if ($check_kelas_siswa_ == 'true') {
                                        $get_id_kelas_siswa_ = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;
                                    }
                                    else {
                                        return redirect('/petugas/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
                                    }
                                }
                                else {
                                    $session_id_kelas_siswa_ = session()->get('pembayaran')['id_kelas_siswa'];
                                }

                                if ($get_id_kelas_siswa_ != '') {
                                    $get_id_spp_ = Spp::where('id_kelas_siswa',$get_id_kelas_siswa_)->get()[0]->id_spp;
                                }
                                else {
                                    $get_id_spp_ = Spp::where('id_kelas_siswa',$session_id_kelas_siswa_)->get()[0]->id_spp;   
                                }

                                if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '') {
                                    $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                                                      ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                      ->get()[0]->id_spp_bulan_tahun;
                                }
                                else {
                                    $session_id_spp_bulan_tahun_ = session()->get('pembayaran')['id_spp_bulan_tahun'];
                                }
                                
                                $data_spp_bayar = [
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_ == '' ? $session_id_spp_bulan_tahun_ : $get_id_spp_bulan_tahun_,
                                    'tanggal_bayar'    => import_date_excel($cells[7]->getValue()),
                                    'total_biaya'      => $cells[8]->getValue(),
                                    'nominal_bayar'    => $cells[9]->getValue(),
                                    'kembalian'        => $cells[10]->getValue(),
                                    'keterangan_bayar' => $cells[11]->getValue()
                                ];

                                SppBayar::firstOrCreate($data_spp_bayar);
                                if (!session()->has('pembayaran')) {
                                    $session_spp = [
                                        'id_kelas_siswa'     => $get_id_kelas_siswa_,
                                        'id_spp'             => $get_id_spp_,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_,
                                    ];
                                    session()->put('pembayaran',$session_spp);
                                }
                                if (session()->has('pembayaran') && $get_id_kelas_siswa_ != '') {
                                    $session_spp = [
                                        'id_kelas_siswa'     => $get_id_kelas_siswa_,
                                        'id_spp'             => $get_id_spp_,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_,
                                    ];
                                    session()->put('pembayaran',$session_spp);
                                }
                            }
                        }
                    }
                }
            }

            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getIndex() === 1 && strtoupper($sheet->getName()) == 'PEMBAYARAN') {
                    foreach ($sheet->getRowIterator() as $num => $row) {
                        if ($num > 1) {
                            $cells = $row->getCells();
                            if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                $check_kelas_siswa_ = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                if ($check_kelas_siswa_ == 'true') {
                                    $get_id_kelas_siswa_ = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;
                                }
                                else {
                                    return redirect('/petugas/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
                                }
                            }
                            else {
                                $session_id_kelas_siswa_ = session()->get('pembayaran')['id_kelas_siswa'];
                            }

                            if ($get_id_kelas_siswa_ != '') {
                                $get_id_spp_ = Spp::where('id_kelas_siswa',$get_id_kelas_siswa_)->get()[0]->id_spp;
                            }
                            else {
                                $get_id_spp_ = Spp::where('id_kelas_siswa',$session_id_kelas_siswa_)->get()[0]->id_spp;   
                            }

                            if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '') {
                                $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                                                  ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                  ->get()[0]->id_spp_bulan_tahun;
                            }
                            else {
                                $session_id_spp_bulan_tahun_ = session()->get('pembayaran')['id_spp_bulan_tahun'];
                            }
                            
                            $data_spp_bayar = [
                                'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_ == '' ? $session_id_spp_bulan_tahun_ : $get_id_spp_bulan_tahun_,
                                'tanggal_bayar'    => import_date_excel($cells[7]->getValue()),
                                'total_biaya'      => $cells[8]->getValue(),
                                'nominal_bayar'    => $cells[9]->getValue(),
                                'kembalian'        => $cells[10]->getValue(),
                                'keterangan_bayar' => $cells[11]->getValue()
                            ];

                            SppBayar::firstOrCreate($data_spp_bayar);
                            if (!session()->has('pembayaran')) {
                                $session_spp = [
                                    'id_kelas_siswa'     => $get_id_kelas_siswa_,
                                    'id_spp'             => $get_id_spp_,
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_,
                                ];
                                session()->put('pembayaran',$session_spp);
                            }
                            if (session()->has('pembayaran') && $get_id_kelas_siswa_ != '') {
                                $session_spp = [
                                    'id_kelas_siswa'     => $get_id_kelas_siswa_,
                                    'id_spp'             => $get_id_spp_,
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_,
                                ];
                                session()->put('pembayaran',$session_spp);
                            }
                        }
                    }
                }
            }

            $reader->close();
        }

        return redirect('/petugas/spp')->with('message','Berhasil Import SPP');
    }

    public function importSPPKantin(Request $request)
    {
        $file_import = $request->file_import;

        foreach ($file_import as $key => $value) {
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open($file_import[$key]);
            
            // SHEET 1
            $get_id_kelas_siswa     = '';
            $get_id_spp             = '';
            // END SHEET 1
            
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getIndex() === 0) {
                    if (strtoupper($sheet->getName()) == 'SPP') {
                        foreach ($sheet->getRowIterator() as $num => $row) {
                            if ($num > 1) {
                                $cells = $row->getCells();
                                if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                    $check_kelas_siswa = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                    if ($check_kelas_siswa == 'true') {
                                        $get_id_kelas_siswa = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;

                                        $get_id_spp = Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->firstOrFail()->id_spp;
                                    }
                                    else {
                                        return redirect('/petugas/spp/import')->with('log','Siswa " '.$cells[2]->getValue().' " pada sheet SPP tidak ditemukan di kelas siswa! Mohon periksa kembali!');
                                    }
                                }

                                if ($cells[7]->getValue() != '') {
                                    $check_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[7]->getValue(),'-'))
                                                             ->count();
                                    if ($check_kantin == 0) { 
                                        return redirect('/petugas/spp/import')->with('log','Data Kantin " '.$cells[7].' " tidak ditemukan! Mohon cek kembali data kantin');
                                    }
                                }

                                if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '' && $cells[7]->getValue() != '') {
                                    $count_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                          ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                          ->count();
                                    $id_kantin = Kantin::where('slug_nama_kantin',$cells[7]->getValue())->get()[0]->id_kantin;
                                    if ($count_spp_bulan_tahun == 0) {
                                        $data_spp_bulan_tahun = [
                                            'id_spp'      => $get_id_spp,
                                            'bulan_tahun' => $cells[5]->getValue().', '.$cells[6]->getValue(),
                                            'id_kantin'   => $id_kantin
                                        ];

                                        SppBulanTahun::where('id_spp',$get_id_spp)
                                                    ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                    ->update($data_spp_bulan_tahun);
                                    }
                                }
                            }
                        }   
                    }
                }
            }

            $reader->close();
        }

        return redirect('/petugas/spp')->with('message','Berhasil Import SPP Kantin');
    }
}
