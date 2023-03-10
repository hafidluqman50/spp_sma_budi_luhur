<?php 

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\KelasSiswa;
use App\Models\Kantin;
use App\Models\HistoryProsesSpp;
use App\Models\PemasukanKantin;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Excel
{
	
	public function __construct()
	{

	}

	public static function contohExportSpp()
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
        $spreadsheet->getActiveSheet()->setCellValue('E2','2022/2023');
        $spreadsheet->getActiveSheet()->setCellValue('F2','Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('G2','2022');
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
        $spreadsheet->getActiveSheet()->setCellValue('E4','2022/2023');
        $spreadsheet->getActiveSheet()->setCellValue('F4','September');
        $spreadsheet->getActiveSheet()->setCellValue('G4','2022');
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
        $spreadsheet->getActiveSheet()->setCellValue('G6','2022');
        $spreadsheet->getActiveSheet()->setCellValue('H6','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->setCellValue('I6','Pembayaran Fasilitas');
        $spreadsheet->getActiveSheet()->setCellValue('J6','10000');
        $spreadsheet->getActiveSheet()->setCellValue('K6','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L6','sudah-lunas');
        $spreadsheet->getActiveSheet()->setCellValue('I7','Uang Makan');
        $spreadsheet->getActiveSheet()->setCellValue('J7','10000');
        $spreadsheet->getActiveSheet()->setCellValue('K7','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L7','sudah-lunas');
        $spreadsheet->getActiveSheet()->mergeCells('A4:A7');
        $spreadsheet->getActiveSheet()->mergeCells('B4:B7');
        $spreadsheet->getActiveSheet()->mergeCells('C4:C7');
        $spreadsheet->getActiveSheet()->mergeCells('D4:D7');
        $spreadsheet->getActiveSheet()->mergeCells('E4:E7');
        $spreadsheet->getActiveSheet()->mergeCells('F4:F5');
        $spreadsheet->getActiveSheet()->mergeCells('G4:G5');
        $spreadsheet->getActiveSheet()->mergeCells('H4:H5');
        $spreadsheet->getActiveSheet()->mergeCells('F6:F7');
        $spreadsheet->getActiveSheet()->mergeCells('G6:G7');
        $spreadsheet->getActiveSheet()->mergeCells('H6:H7');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:L7')->applyFromArray($styleAlignment);
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
        $spreadsheet->getActiveSheet()->setCellValue('F1','Tanggal Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('G1','Total Biaya');
        $spreadsheet->getActiveSheet()->setCellValue('H1','Total Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('I1','Kembalian');
        $spreadsheet->getActiveSheet()->setCellValue('J1','Keterangan');
        $spreadsheet->getActiveSheet()->setCellValue('K1','Jenis Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('L1','Bulan');
        $spreadsheet->getActiveSheet()->setCellValue('M1','Tahun');
        $spreadsheet->getActiveSheet()->setCellValue('N1','SPP');
        $spreadsheet->getActiveSheet()->setCellValue('O1','Nominal Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('P1','Bayar Kantin');

        $spreadsheet->getActiveSheet()->setCellValue('A2','1');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E2','2022/2023');
        $spreadsheet->getActiveSheet()->setCellValue('F2',"'14-08-2021");
        $spreadsheet->getActiveSheet()->setCellValue('G2','30000');
        $spreadsheet->getActiveSheet()->setCellValue('H2',"30000");
        $spreadsheet->getActiveSheet()->setCellValue('I2','0');
        $spreadsheet->getActiveSheet()->setCellValue('J2','Pembayaran SPP Bulan Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('K2','cash');
        $spreadsheet->getActiveSheet()->setCellValue('L2','Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('M2','2022');
        $spreadsheet->getActiveSheet()->setCellValue('N2','Pembayaran Gedung');
        $spreadsheet->getActiveSheet()->setCellValue('O2','10000');
        $spreadsheet->getActiveSheet()->setCellValue('N3','Pembayaran Akademik');
        $spreadsheet->getActiveSheet()->setCellValue('O3','20000');
        $spreadsheet->getActiveSheet()->mergeCells('A2:A3');
        $spreadsheet->getActiveSheet()->mergeCells('B2:B3');
        $spreadsheet->getActiveSheet()->mergeCells('C2:C3');
        $spreadsheet->getActiveSheet()->mergeCells('D2:D3');
        $spreadsheet->getActiveSheet()->mergeCells('E2:E3');
        $spreadsheet->getActiveSheet()->mergeCells('F2:F3');
        $spreadsheet->getActiveSheet()->mergeCells('G2:G3');
        $spreadsheet->getActiveSheet()->mergeCells('H2:H3');
        $spreadsheet->getActiveSheet()->mergeCells('I2:I3');
        $spreadsheet->getActiveSheet()->mergeCells('J2:J3');
        $spreadsheet->getActiveSheet()->mergeCells('K2:K3');
        $spreadsheet->getActiveSheet()->mergeCells('L2:L3');
        $spreadsheet->getActiveSheet()->mergeCells('M2:M3');

        $spreadsheet->getActiveSheet()->setCellValue('A4','2');
        $spreadsheet->getActiveSheet()->setCellValue('B4','00088899913');
        $spreadsheet->getActiveSheet()->setCellValue('C4','Uchiha Tiara');
        $spreadsheet->getActiveSheet()->setCellValue('D4','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E4','2022/2023');
        $spreadsheet->getActiveSheet()->setCellValue('F4',"'13-09-2021");
        $spreadsheet->getActiveSheet()->setCellValue('G4','50000');
        $spreadsheet->getActiveSheet()->setCellValue('H4',"70000");
        $spreadsheet->getActiveSheet()->setCellValue('I4','20000');
        $spreadsheet->getActiveSheet()->setCellValue('J4','Pembayaran September - Oktober 2022');
        $spreadsheet->getActiveSheet()->setCellValue('K4','cash');
        $spreadsheet->getActiveSheet()->setCellValue('L4','September');
        $spreadsheet->getActiveSheet()->setCellValue('M4','2022');
        $spreadsheet->getActiveSheet()->setCellValue('N4','Pembayaran Akademik');
        $spreadsheet->getActiveSheet()->setCellValue('O4','20000');
        $spreadsheet->getActiveSheet()->setCellValue('N5','Pembayaran Gedung');
        $spreadsheet->getActiveSheet()->setCellValue('O5','10000');
        $spreadsheet->getActiveSheet()->setCellValue('L6','Oktober');
        $spreadsheet->getActiveSheet()->setCellValue('M6','2022');
        $spreadsheet->getActiveSheet()->setCellValue('N6','Pembayaran Fasilitas');
        $spreadsheet->getActiveSheet()->setCellValue('O6','10000');
        $spreadsheet->getActiveSheet()->setCellValue('N7','Uang Makan');
        $spreadsheet->getActiveSheet()->setCellValue('O7','10000');
        $spreadsheet->getActiveSheet()->setCellValue('P7','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->mergeCells('A4:A7');
        $spreadsheet->getActiveSheet()->mergeCells('B4:B7');
        $spreadsheet->getActiveSheet()->mergeCells('C4:C7');
        $spreadsheet->getActiveSheet()->mergeCells('D4:D7');
        $spreadsheet->getActiveSheet()->mergeCells('E4:E7');
        $spreadsheet->getActiveSheet()->mergeCells('F4:F7');
        $spreadsheet->getActiveSheet()->mergeCells('G4:G7');
        $spreadsheet->getActiveSheet()->mergeCells('H4:H7');
        $spreadsheet->getActiveSheet()->mergeCells('I4:I7');
        $spreadsheet->getActiveSheet()->mergeCells('J4:J7');
        $spreadsheet->getActiveSheet()->mergeCells('K4:K7');
        $spreadsheet->getActiveSheet()->mergeCells('L4:L5');
        $spreadsheet->getActiveSheet()->mergeCells('L6:L7');
        $spreadsheet->getActiveSheet()->mergeCells('M6:M7');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:O7')->applyFromArray($styleAlignment);
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
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);

        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(2)->setTitle('PEMASUKAN KANTIN');
        $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NISN');
        $spreadsheet->getActiveSheet()->setCellValue('C1','Nama Siswa');
        $spreadsheet->getActiveSheet()->setCellValue('D1','Kelas');
        $spreadsheet->getActiveSheet()->setCellValue('E1','Tahun Ajaran');
        $spreadsheet->getActiveSheet()->setCellValue('F1','Bulan');
        $spreadsheet->getActiveSheet()->setCellValue('G1','Tahun');
        $spreadsheet->getActiveSheet()->setCellValue('H1','Nama Kantin');
        $spreadsheet->getActiveSheet()->setCellValue('I1','Nominal Harus Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('J1','Nominal Bayar');
        $spreadsheet->getActiveSheet()->setCellValue('A2','1.');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('E2','2022/2023');
        $spreadsheet->getActiveSheet()->setCellValue('F2','Agustus');
        $spreadsheet->getActiveSheet()->setCellValue('G2','2022');
        $spreadsheet->getActiveSheet()->setCellValue('H2','Kantin Pak Mamat');
        $spreadsheet->getActiveSheet()->setCellValue('I2','100000');
        $spreadsheet->getActiveSheet()->setCellValue('J2','0');
        $spreadsheet->getActiveSheet()->setCellValue('H3','Dapur');
        $spreadsheet->getActiveSheet()->setCellValue('I3','100000');
        $spreadsheet->getActiveSheet()->setCellValue('J3','100000');
        $spreadsheet->getActiveSheet()->mergeCells('A2:A3');
        $spreadsheet->getActiveSheet()->mergeCells('B2:B3');
        $spreadsheet->getActiveSheet()->mergeCells('C2:C3');
        $spreadsheet->getActiveSheet()->mergeCells('D2:D3');
        $spreadsheet->getActiveSheet()->mergeCells('E2:E3');
        $spreadsheet->getActiveSheet()->mergeCells('F2:F3');
        $spreadsheet->getActiveSheet()->mergeCells('G2:G3');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:J3')->applyFromArray($styleAlignment);
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

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
	}

	public static function importSpp($file_import)
	{
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
            $get_id_spp_bayar_data_  = '';
            $get_id_spp_bayar_       = '';
            $get_tanggal_bayar_      = '';
            $get_id_spp_bulan_tahun_ = '';
            // END SHEET 2 //

            // SHEET 3 //
            $get_id_kelas_siswa__     = '';
            $get_id_spp__             = '';
            $get_id_spp_bulan_tahun__ = '';
            // END SHEET 3 //
            
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
                                        return redirect('/admin/spp/import')->with('log','Siswa " '.$cells[2]->getValue().' " pada sheet SPP tidak ditemukan di data kelas! Mohon periksa kembali!');
                                    }
                                }
                                else {
                                    $session_id_kelas_siswa = session()->get('spp')['id_kelas_siswa'];
                                }

                                if ($cells[7]->getValue() != '') {
                                    $check_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[7]->getValue(),'-'))
                                                             ->count();
                                    if ($check_kantin == 0) { 
                                        return redirect('/admin/spp/import')->with('log','Data Kantin " '.$cells[7].' " tidak ditemukan! Mohon cek kembali data kantin');
                                    }
                                }

                                $check_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                         ->count();

                                if ($check_kolom_spp == 0) { 
                                    return redirect('/admin/spp/import')->with('log','Kolom Spp " '.$cells[8].' " tidak ditemukan! Mohon cek kembali data kolom spp');
                                }

                                if (Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->count() == 0) {

                                    $data_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa,
                                        // 'total_harus_bayar' => $cells[9]->getValue() - $cells[10]->getValue(),
                                        'id_users'          => Auth::user()->id_users
                                    ];
                                    Spp::firstOrCreate($data_spp);
                                    $get_id_spp = Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->get()[0]->id_spp;

                                }
                                else {
                                    $get_spp    = Spp::where('id_kelas_siswa',$get_id_kelas_siswa)->get()[0];       
                                    $get_id_spp = $get_spp->id_spp;
                                }

                                $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[8]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;

                                if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '' && $cells[7]->getValue() != '') {
                                    $count_spp_bulan_tahun = SppBulanTahun::where('id_spp',$get_id_spp)
                                                                          ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                          ->count();
                                    $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[7]->getValue(),'-'))->get()[0]->id_kantin;

                                    if ($count_spp_bulan_tahun == 0) {
                                        $data_spp_bulan_tahun = [
                                            'id_spp'        => $get_id_spp,
                                            'bulan_tahun'   => $cells[5]->getValue().', '.$cells[6]->getValue(),
                                            'bulan'         => describe_month($cells[5]->getValue()),
                                            'tahun'         => $cells[6]->getValue(),
                                            'id_kantin'     => $id_kantin,
                                            'status_delete' => 0
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
                                        'status_bayar'       => $status_bayar[$cells[11]->getValue()],
                                        'created_at'         => date('Y-m-d H:i:s'),
                                        'updated_at'         => NULL
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
                                        'status_bayar'       => $status_bayar[$cells[11]->getValue()],
                                        'created_at'         => date('Y-m-d H:i:s'),
                                        'updated_at'         => NULL
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
                                        return redirect('/admin/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
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
                                // dd($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '');

                                if ($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '') {
                                    // $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                    //                                   ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                    //                                   ->get()[0]->id_spp_bulan_tahun;
                                    // $get_id_spp_bayar_data_ = (String)Str::uuid();
                                    $get_tanggal_bayar_     = import_date_excel($cells[5]->getValue());

                                    $data_spp_bayar_data = [
                                        'id_spp'               => $get_id_spp_,
                                        // 'id_spp_bayar_data'    => $get_id_spp_bayar_data_,
                                        'tanggal_bayar'        => import_date_excel($cells[5]->getValue()),
                                        'total_biaya'          => $cells[6]->getValue(),
                                        'nominal_bayar'        => $cells[7]->getValue(),
                                        'kembalian'            => $cells[8]->getValue(),
                                        'keterangan_bayar_spp' => $cells[9]->getValue(),
                                        'jenis_bayar'          => $cells[10]->getValue(),
                                        'id_users'             => auth()->user()->id_users
                                    ];
                                    SppBayarData::firstOrCreate($data_spp_bayar_data);
                                    $get_id_spp_bayar_data_ = SppBayarData::where('id_spp',$get_id_spp_)
                                                                        ->where('tanggal_bayar',import_date_excel($cells[5]->getValue()))
                                                                        ->where('total_biaya',$cells[6]->getValue())
                                                                        ->where('nominal_bayar',$cells[7]->getValue())
                                                                        ->where('kembalian',$cells[8]->getValue())
                                                                        ->where('keterangan_bayar_spp',$cells[9]->getValue())
                                                                        ->get()[0]->id_spp_bayar_data;
                                }
                                else {
                                    $session_id_spp_bayar_data_ = session()->get('pembayaran')['id_spp_bayar_data'];
                                    $session_tanggal_bayar_     = session()->get('pembayaran')['tanggal_bayar'];
                                }
                                
                                if ($cells[10]->getValue() != '' && $cells[11]->getValue() != '') {
                                    // $get_id_spp_bayar_ = (string)Str::uuid();
                                    $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                                                            ->where('bulan_tahun',$cells[11]->getValue().', '.$cells[12]->getValue())
                                                                            ->get()[0]->id_spp_bulan_tahun;

                                    $data_spp_bayar = [
                                        'id_spp_bayar_data'  => $get_id_spp_bayar_data_,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_ == '' ? $session_id_spp_bulan_tahun_ : $get_id_spp_bulan_tahun_,
                                    ];

                                    SppBayar::firstOrCreate($data_spp_bayar);

                                    $get_id_spp_bayar_ = SppBayar::where('id_spp_bulan_tahun',$get_id_spp_bulan_tahun_)
                                                                 ->where('id_spp_bayar_data',$get_id_spp_bayar_data_)
                                                                 ->get()[0]->id_spp_bayar;

                                    $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[13]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;

                                    if ($cells[15]->getValue() == '') {
                                        $id_kantin == '';
                                    }
                                    else {
                                        $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[15]->getValue(),'-'))->firstOrFail()->id_kantin;
                                    }
                                    
                                    $data_spp_bayar_detail = [
                                        'id_spp_bayar'  => $get_id_spp_bayar_,
                                        'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                        'id_kolom_spp'  => $id_kolom_spp,
                                        'nominal_bayar' => $cells[14]->getValue(),
                                        'id_kantin'     => $id_kantin
                                    ];
                                    SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                                }
                                else {
                                    $get_id_spp_bayar_ = session()->get('pembayaran')['id_spp_bayar'];
                                    // $spp_bayar_detail_row = SppBayar::where('id_spp_bayar',$get_id_spp_bayar_)->get()[0];

                                    $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[13]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;

                                    if ($cells[15]->getValue() == '') {
                                        $id_kantin == '';
                                    }
                                    else {
                                        $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[15]->getValue(),'-'))->firstOrFail()->id_kantin;
                                    }

                                    $data_spp_bayar_detail = [
                                        'id_spp_bayar'  => $get_id_spp_bayar_,
                                        'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                        'id_kolom_spp'  => $id_kolom_spp,
                                        'nominal_bayar' => $cells[14]->getValue(),
                                        'id_kantin'     => $id_kantin
                                    ];

                                    SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                                }

                                if (!session()->has('pembayaran')) {
                                    $session_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                        'id_spp'            => $get_id_spp_,
                                        'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                        'id_spp_bayar'      => $get_id_spp_bayar_,
                                        'tanggal_bayar'     => $get_tanggal_bayar_
                                    ];
                                    session()->put('pembayaran',$session_spp);
                                }
                                if (session()->has('pembayaran') && $get_id_kelas_siswa_ != '') {
                                    $session_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                        'id_spp'            => $get_id_spp_,
                                        'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                        'id_spp_bayar'      => $get_id_spp_bayar_,
                                        'tanggal_bayar'     => $get_tanggal_bayar_
                                    ];
                                    session()->put('pembayaran',$session_spp);
                                }
                            }
                        }
                    }
                    else if (strtoupper($sheet->getName()) == 'PEMASUKAN KANTIN') {
                        foreach ($sheet->getRowIterator() as $num => $row) {
                            if ($num > 1) {
                                $cells = $row->getCells();
                                if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                    $check_kelas_siswa_ = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                    if ($check_kelas_siswa_ == 'true') {
                                        $get_id_kelas_siswa_ = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;
                                    }
                                    else {
                                        return redirect('/admin/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
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
                                // dd($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '');

                                if ($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '') {
                                    // $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                    //                                   ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                    //                                   ->get()[0]->id_spp_bulan_tahun;
                                    // $get_id_spp_bayar_data_ = (String)Str::uuid();
                                    $get_tanggal_bayar_     = import_date_excel($cells[5]->getValue());

                                    $data_spp_bayar_data = [
                                        'id_spp'               => $get_id_spp_,
                                        // 'id_spp_bayar_data'    => $get_id_spp_bayar_data_,
                                        'tanggal_bayar'        => import_date_excel($cells[5]->getValue()),
                                        'total_biaya'          => $cells[6]->getValue(),
                                        'nominal_bayar'        => $cells[7]->getValue(),
                                        'kembalian'            => $cells[8]->getValue(),
                                        'keterangan_bayar_spp' => $cells[9]->getValue(),
                                        'id_users'             => auth()->user()->id_users
                                    ];
                                    SppBayarData::firstOrCreate($data_spp_bayar_data);
                                    $get_id_spp_bayar_data_ = SppBayarData::where('id_spp',$get_id_spp_)
                                                                        ->where('tanggal_bayar',import_date_excel($cells[5]->getValue()))
                                                                        ->where('total_biaya',$cells[6]->getValue())
                                                                        ->where('nominal_bayar',$cells[7]->getValue())
                                                                        ->where('kembalian',$cells[8]->getValue())
                                                                        ->where('keterangan_bayar_spp',$cells[9]->getValue())
                                                                        ->get()[0]->id_spp_bayar_data;
                                }
                                else {
                                    $session_id_spp_bayar_data_ = session()->get('pembayaran')['id_spp_bayar_data'];
                                    $session_tanggal_bayar_     = session()->get('pembayaran')['tanggal_bayar'];
                                }
                                
                                if ($cells[10]->getValue() != '' && $cells[11]->getValue() != '') {
                                    // $get_id_spp_bayar_ = (string)Str::uuid();
                                    $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                                                            ->where('bulan_tahun',$cells[10]->getValue().', '.$cells[11]->getValue())
                                                                            ->get()[0]->id_spp_bulan_tahun;

                                    $data_spp_bayar = [
                                        'id_spp_bayar_data'  => $get_id_spp_bayar_data_,
                                        'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_ == '' ? $session_id_spp_bulan_tahun_ : $get_id_spp_bulan_tahun_,
                                    ];

                                    SppBayar::firstOrCreate($data_spp_bayar);

                                    $get_id_spp_bayar_ = SppBayar::where('id_spp_bulan_tahun',$get_id_spp_bulan_tahun_)
                                                                 ->where('id_spp_bayar_data',$get_id_spp_bayar_data_)
                                                                 ->get()[0]->id_spp_bayar;

                                    $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[12]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;

                                    $data_spp_bayar_detail = [
                                        'id_spp_bayar'  => $get_id_spp_bayar_,
                                        'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                        'id_kolom_spp'  => $id_kolom_spp,
                                        'nominal_bayar' => $cells[13]->getValue()
                                    ];
                                    SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                                }
                                else {
                                    $get_id_spp_bayar_ = session()->get('pembayaran')['id_spp_bayar'];
                                    // $spp_bayar_detail_row = SppBayar::where('id_spp_bayar',$get_id_spp_bayar_)->get()[0];

                                    $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[12]->getValue(),'-'))
                                                         ->get()[0]->id_kolom_spp;
                                                         
                                    $data_spp_bayar_detail = [
                                        'id_spp_bayar'  => $get_id_spp_bayar_,
                                        'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                        'id_kolom_spp'  => $id_kolom_spp,
                                        'nominal_bayar' => $cells[13]->getValue()
                                    ];
                                    SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                                }

                                if (!session()->has('pembayaran')) {
                                    $session_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                        'id_spp'            => $get_id_spp_,
                                        'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                        'id_spp_bayar'      => $get_id_spp_bayar_,
                                        'tanggal_bayar'     => $get_tanggal_bayar_
                                    ];
                                    session()->put('pembayaran',$session_spp);
                                }
                                if (session()->has('pembayaran') && $get_id_kelas_siswa_ != '') {
                                    $session_spp = [
                                        'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                        'id_spp'            => $get_id_spp_,
                                        'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                        'id_spp_bayar'      => $get_id_spp_bayar_,
                                        'tanggal_bayar'     => $get_tanggal_bayar_
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
                                    return redirect('/admin/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
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
                            // dd($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '');

                            if ($cells[5]->getValue() != '' && (string)$cells[6]->getValue() != '' && (string)$cells[7]->getValue() != '' && (string)$cells[8]->getValue() != '' && (string)$cells[9]->getValue() != '') {
                                // $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                //                                   ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                //                                   ->get()[0]->id_spp_bulan_tahun;
                                // $get_id_spp_bayar_data_ = (String)Str::uuid();
                                $get_tanggal_bayar_     = import_date_excel($cells[5]->getValue());

                                $data_spp_bayar_data = [
                                    'id_spp'               => $get_id_spp_,
                                    // 'id_spp_bayar_data'    => $get_id_spp_bayar_data_,
                                    'tanggal_bayar'        => import_date_excel($cells[5]->getValue()),
                                    'total_biaya'          => $cells[6]->getValue(),
                                    'nominal_bayar'        => $cells[7]->getValue(),
                                    'kembalian'            => $cells[8]->getValue(),
                                    'keterangan_bayar_spp' => $cells[9]->getValue(),
                                    'jenis_bayar'          => $cells[10]->getValue(),
                                    'id_users'             => auth()->user()->id_users
                                ];
                                SppBayarData::firstOrCreate($data_spp_bayar_data);
                                $get_id_spp_bayar_data_ = SppBayarData::where('id_spp',$get_id_spp_)
                                                                    ->where('tanggal_bayar',import_date_excel($cells[5]->getValue()))
                                                                    ->where('total_biaya',$cells[6]->getValue())
                                                                    ->where('nominal_bayar',$cells[7]->getValue())
                                                                    ->where('kembalian',$cells[8]->getValue())
                                                                    ->where('keterangan_bayar_spp',$cells[9]->getValue())
                                                                    ->get()[0]->id_spp_bayar_data;
                            }
                            else {
                                $session_id_spp_bayar_data_ = session()->get('pembayaran')['id_spp_bayar_data'];
                                $session_tanggal_bayar_     = session()->get('pembayaran')['tanggal_bayar'];
                            }
                            
                            if ($cells[10]->getValue() != '' && $cells[11]->getValue() != '') {
                                // $get_id_spp_bayar_ = (string)Str::uuid();
                                $get_id_spp_bulan_tahun_ = SppBulanTahun::where('id_spp',$get_id_spp_)
                                                                        ->where('bulan_tahun',$cells[11]->getValue().', '.$cells[12]->getValue())
                                                                        ->get()[0]->id_spp_bulan_tahun;

                                $data_spp_bayar = [
                                    'id_spp_bayar_data'  => $get_id_spp_bayar_data_,
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun_ == '' ? $session_id_spp_bulan_tahun_ : $get_id_spp_bulan_tahun_,
                                ];

                                SppBayar::firstOrCreate($data_spp_bayar);

                                $get_id_spp_bayar_ = SppBayar::where('id_spp_bulan_tahun',$get_id_spp_bulan_tahun_)
                                                             ->where('id_spp_bayar_data',$get_id_spp_bayar_data_)
                                                             ->get()[0]->id_spp_bayar;

                                $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[13]->getValue(),'-'))
                                                     ->get()[0]->id_kolom_spp;
                                // ddd($cells);
                                if ($cells[15]->getValue() == '') {
                                    $id_kantin == '';
                                }
                                else {
                                    $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[15]->getValue(),'-'))->firstOrFail()->id_kantin;
                                }

                                $data_spp_bayar_detail = [
                                    'id_spp_bayar'  => $get_id_spp_bayar_,
                                    'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                    'id_kolom_spp'  => $id_kolom_spp,
                                    'nominal_bayar' => $cells[14]->getValue(),
                                    'id_kantin'     => $id_kantin
                                ];
                                SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                            }
                            else {
                                $get_id_spp_bayar_ = session()->get('pembayaran')['id_spp_bayar'];
                                // $spp_bayar_detail_row = SppBayar::where('id_spp_bayar',$get_id_spp_bayar_)->get()[0];

                                $id_kolom_spp = KolomSpp::where('slug_kolom_spp',Str::slug($cells[13]->getValue(),'-'))
                                                     ->get()[0]->id_kolom_spp;
                                                     
                                if ($cells[15]->getValue() == '') {
                                    $id_kantin == '';
                                }
                                else {
                                    $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[15]->getValue(),'-'))->firstOrFail()->id_kantin;
                                }

                                $data_spp_bayar_detail = [
                                    'id_spp_bayar'  => $get_id_spp_bayar_,
                                    'tanggal_bayar' => $get_tanggal_bayar_ == '' ? $session_tanggal_bayar_ : $get_tanggal_bayar_,
                                    'id_kolom_spp'  => $id_kolom_spp,
                                    'nominal_bayar' => $cells[14]->getValue(),
                                    'id_kantin'     => $id_kantin
                                ];

                                SppBayarDetail::firstOrCreate($data_spp_bayar_detail);
                            }

                            if (!session()->has('pembayaran')) {
                                $session_spp = [
                                    'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                    'id_spp'            => $get_id_spp_,
                                    'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                    'id_spp_bayar'      => $get_id_spp_bayar_,
                                    'tanggal_bayar'     => $get_tanggal_bayar_
                                ];
                                session()->put('pembayaran',$session_spp);
                            }
                            if (session()->has('pembayaran') && $get_id_kelas_siswa_ != '') {
                                $session_spp = [
                                    'id_kelas_siswa'    => $get_id_kelas_siswa_,
                                    'id_spp'            => $get_id_spp_,
                                    'id_spp_bayar_data' => $get_id_spp_bayar_data_,
                                    'id_spp_bayar'      => $get_id_spp_bayar_,
                                    'tanggal_bayar'     => $get_tanggal_bayar_
                                ];
                                session()->put('pembayaran',$session_spp);
                            }
                        }
                    }
                }
            }

            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getIndex() === 2 && strtoupper($sheet->getName()) == 'PEMASUKAN KANTIN') {
                    foreach ($sheet->getRowIterator() as $num => $row) {
                        if ($num > 1) {
                            $cells = $row->getCells();
                            if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '' && $cells[3]->getValue() != '' && $cells[4]->getValue() != '') {
                                $check_kelas_siswa__ = KelasSiswa::checkSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue());

                                if ($check_kelas_siswa__ == 'true') {
                                    $get_id_kelas_siswa__ = KelasSiswa::getSiswa($cells[1]->getValue(),$cells[3]->getValue(),$cells[4]->getValue())[0]->id_kelas_siswa;
                                }
                                else {
                                    return redirect('/admin/spp/import')->with('log','Siswa '.$cells[2]->getValue().' pada sheet Pembayaran tidak ditemukan di kelas siswa! Mohon periksa kembali!');
                                }
                            }
                            else {
                                $session_id_kelas_siswa__ = session()->get('pemasukan_kantin')['id_kelas_siswa'];
                            }

                            if ($get_id_kelas_siswa__ != '') {
                                $get_id_spp__ = Spp::where('id_kelas_siswa',$get_id_kelas_siswa__)->get()[0]->id_spp;
                            }
                            else {
                                $get_id_spp__ = Spp::where('id_kelas_siswa',$session_id_kelas_siswa__)->get()[0]->id_spp;   
                            }

                            if ($cells[5]->getValue() != '' && $cells[6]->getValue() != '') {
                                $get_id_spp_bulan_tahun__ = SppBulanTahun::where('id_spp',$get_id_spp__)
                                                                  ->where('bulan_tahun',$cells[5]->getValue().', '.$cells[6]->getValue())
                                                                  ->get()[0]->id_spp_bulan_tahun;
                            }
                            else {
                                $session_id_spp_bulan_tahun__ = session()->get('pemasukan_kantin')['id_spp_bulan_tahun'];
                            }
                            $id_kantin = Kantin::where('slug_nama_kantin',Str::slug($cells[7]->getValue(),'-'))->firstOrFail()->id_kantin;

                            $data_pemasukan_kantin = [
                                'id_spp_bulan_tahun'  => $get_id_spp_bulan_tahun__ != '' ? $get_id_spp_bulan_tahun__ : $session_id_spp_bulan_tahun__,
                                'id_kantin'           => $id_kantin,
                                'nominal_harus_bayar' => $cells[8]->getValue(),
                                'nominal_pemasukan'   => $cells[9]->getValue()
                            ];

                            PemasukanKantin::create($data_pemasukan_kantin);

                            if (!session()->has('pemasukan_kantin')) {
                                $session_pemasukan_kantin = [
                                    'id_kelas_siswa'     => $get_id_kelas_siswa__,
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun__
                                ];
                                session()->put('pemasukan_kantin',$session_pemasukan_kantin);
                            }
                            if (session()->has('pemasukan_kantin') && $get_id_kelas_siswa_ != '') {
                                $session_pemasukan_kantin = [
                                    'id_kelas_siswa'     => $get_id_kelas_siswa__,
                                    'id_spp_bulan_tahun' => $get_id_spp_bulan_tahun__
                                ];
                                session()->put('pemasukan_kantin',$session_pemasukan_kantin);
                            }
                        }
                    }
                }
            }

            $reader->close();
        }
	}
}