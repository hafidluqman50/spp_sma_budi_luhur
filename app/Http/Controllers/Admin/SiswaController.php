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

    public function tambah()
    {
        $title          = 'Form Siswa | Admin';
        $keluarga       = Siswa::where('status_delete',0)->get();
        $keluarga_check = new Keluarga;

        return view('Admin.siswa.siswa-tambah',compact('title','keluarga','keluarga_check'));
    }

    public function save(Request $request)
    {
        $id_siswa        = (string)Str::uuid();
        $nisn            = $request->nisn;
        $nama_siswa      = $request->nama_siswa;
        $jenis_kelamin   = $request->jenis_kelamin;
        $tanggal_lahir   = $request->tanggal_lahir;
        $wilayah         = $request->wilayah;
        $asal_wilayah    = $request->asal_wilayah;
        $asal_kelompok   = $request->asal_kelompok;
        $nama_ayah       = $request->nama_ayah;
        $nama_ibu        = $request->nama_ibu;
        $nomor_orang_tua = $request->nomor_wa_ortu;
        $keluarga        = $request->keluarga;

        $data_siswa = [
            'id_siswa'        => $id_siswa,
            'nisn'            => $nisn,
            'nama_siswa'      => $nama_siswa,
            'slug_siswa'      => Str::slug($nama_siswa,'-'),
            'jenis_kelamin'   => $jenis_kelamin,
            'tanggal_lahir'   => $tanggal_lahir,
            'asal_kelompok'   => $asal_kelompok,
            'asal_wilayah'    => $asal_wilayah,
            'wilayah'         => $wilayah,
            'nama_ayah'       => $nama_ayah,
            'nama_ibu'        => $nama_ibu,
            'nomor_orang_tua' => $nomor_orang_tua,
            'status_delete'   => 0
        ];

        Siswa::create($data_siswa);

        if ($keluarga != null) {
            foreach ($keluarga as $key => $value) {
                $data_keluarga = [
                    'id_siswa'          => $id_siswa,
                    'id_siswa_keluarga' => $value
                ];

                Keluarga::create($data_keluarga);
            }
        }

        $data_user = [
            'name'          => 'Ortu '.$nama_siswa,
            'username'      => $nisn,
            'password'      => bcrypt($nisn),
            'level_user'    => 0,
            'status_akun'   => 1,
            'status_delete' => 0
        ];

        User::create($data_user);

        return redirect('/admin/siswa')->with('message','Berhasil Input Siswa');
    }

    public function edit($id)
    {
        $title          = 'Form Siswa | Admin';
        $row            = Siswa::where('id_siswa',$id)->firstOrFail();
        $keluarga       = Siswa::where('status_delete',0)->get();
        $keluarga_check = new Keluarga;

        return view('Admin.siswa.siswa-edit',compact('title','row','keluarga','keluarga_check','id'));
    }

    public function update(Request $request,$id)
    {   
        $nisn_before     = Siswa::where('id_siswa',$id)->firstOrFail()->nisn;
        $nisn            = $request->nisn;
        $nama_siswa      = $request->nama_siswa;
        $jenis_kelamin   = $request->jenis_kelamin;
        $tanggal_lahir   = $request->tanggal_lahir;
        $asal_wilayah    = $request->asal_wilayah;
        $asal_kelompok   = $request->asal_kelompok;
        $wilayah         = $request->wilayah;
        $nama_ayah       = $request->nama_ayah;
        $nama_ibu        = $request->nama_ibu;
        $nomor_orang_tua = $request->nomor_wa_ortu;
        $keluarga        = $request->keluarga;

        // dd($keluarga);

        // if ($id == $keluarga) {
        //     return redirect('/admin/siswa/edit/'.$id)->withInput();
        // }

        $data_siswa = [
            'nisn'            => $nisn,
            'nama_siswa'      => $nama_siswa,
            'slug_siswa'      => Str::slug($nama_siswa,'-'),
            'jenis_kelamin'   => $jenis_kelamin,
            'tanggal_lahir'   => $tanggal_lahir,
            'asal_kelompok'   => $asal_kelompok,
            'asal_wilayah'    => $asal_wilayah,
            'wilayah'         => $wilayah,
            'nama_ayah'       => $nama_ayah,
            'nama_ibu'        => $nama_ibu,
            'nomor_orang_tua' => $nomor_orang_tua
        ];

        Siswa::where('id_siswa',$id)->update($data_siswa);

        if ($keluarga != null) {
            Keluarga::where('id_siswa',$id)->delete();
            foreach ($keluarga as $key => $value) {
                $data_keluarga = [
                    'id_siswa'          => $id,
                    'id_siswa_keluarga' => $value
                ];

                Keluarga::create($data_keluarga);
            }
        }

        $data_users = [
            'name'          => 'Ortu '.$nama_siswa,
            'username'      => $nisn,
            'password'      => bcrypt($nisn),
        ];

        User::where('username',$nisn_before)->update($data_users);

        return redirect('/admin/siswa')->with('message','Berhasil Update Siswa');
    }

    public function delete($id)
    {
        Siswa::where('id_siswa',$id)->update(['status_delete'=>1]);

        return redirect('/admin/siswa')->with('message','Berhasil Delete Siswa');
    }

    public function formImport()
    {
        $title = 'Form Import';

        return view('Admin.siswa.siswa-import',compact('title'));
    }

    public function contohImport()
    {
        $fileName    = 'Contoh Format Import Siswa.xlsx';
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize('12');

        $spreadsheet->setActiveSheetIndex(0)->setTitle('Data Siswa');

        $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NISN');
        $spreadsheet->getActiveSheet()->setCellValue('C1','Nama Siswa');
        $spreadsheet->getActiveSheet()->setCellValue('D1','Jenis Kelamin');
        $spreadsheet->getActiveSheet()->setCellValue('E1','Tanggal Lahir');
        $spreadsheet->getActiveSheet()->setCellValue('F1','Nama Ayah');
        $spreadsheet->getActiveSheet()->setCellValue('G1','Nama Ibu');
        $spreadsheet->getActiveSheet()->setCellValue('H1','Nomor Orang Tua');
        $spreadsheet->getActiveSheet()->setCellValue('I1','Asal Kelompok');
        $spreadsheet->getActiveSheet()->setCellValue('J1','Asal Wilayah');
        $spreadsheet->getActiveSheet()->setCellValue('K1','Wilayah');
        $spreadsheet->getActiveSheet()->setCellValue('L1','Kelas');
        $spreadsheet->getActiveSheet()->setCellValue('M1','Tahun Ajaran');

        $spreadsheet->getActiveSheet()->setCellValue('A2','1');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','laki-laki');
        $spreadsheet->getActiveSheet()->setCellValue('E2',"'24-10-2001");
        $spreadsheet->getActiveSheet()->setCellValue('F2','Uchiha Saburo');
        $spreadsheet->getActiveSheet()->setCellValue('G2','Uchiha Ajeng');
        $spreadsheet->getActiveSheet()->setCellValue('H2','088888090');
        $spreadsheet->getActiveSheet()->setCellValue('I2','Clan Uchiha');
        $spreadsheet->getActiveSheet()->setCellValue('J2','Konohagakure No Sato');
        $spreadsheet->getActiveSheet()->setCellValue('K2','dalam-kota');
        $spreadsheet->getActiveSheet()->setCellValue('L2','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('M2','2021/2022');

        $spreadsheet->getActiveSheet()->setCellValue('A3','2');
        $spreadsheet->getActiveSheet()->setCellValue('B3','00088899913');
        $spreadsheet->getActiveSheet()->setCellValue('C3','Uchiha Tiara');
        $spreadsheet->getActiveSheet()->setCellValue('D3','perempuan');
        $spreadsheet->getActiveSheet()->setCellValue('E3',"'01-10-2001");
        $spreadsheet->getActiveSheet()->setCellValue('F3','Uchiha Saburo');
        $spreadsheet->getActiveSheet()->setCellValue('G3','Uchiha Ajeng');
        $spreadsheet->getActiveSheet()->setCellValue('H3','088888090');
        $spreadsheet->getActiveSheet()->setCellValue('I3','Clan Uchiha');
        $spreadsheet->getActiveSheet()->setCellValue('J3','Konohagakure No Sato');
        $spreadsheet->getActiveSheet()->setCellValue('K3','dalam-kota');
        $spreadsheet->getActiveSheet()->setCellValue('L3','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('M3','2021/2022');

        $spreadsheet->getActiveSheet()->setCellValue('A4','3');
        $spreadsheet->getActiveSheet()->setCellValue('B4','00088899914');
        $spreadsheet->getActiveSheet()->setCellValue('C4','Uchiha Sukirman');
        $spreadsheet->getActiveSheet()->setCellValue('D4','laki-laki');
        $spreadsheet->getActiveSheet()->setCellValue('E4',"'02-10-2001");
        $spreadsheet->getActiveSheet()->setCellValue('F4','Uchiha Saburo');
        $spreadsheet->getActiveSheet()->setCellValue('G4','Uchiha Ajeng');
        $spreadsheet->getActiveSheet()->setCellValue('H4','088888090');
        $spreadsheet->getActiveSheet()->setCellValue('I4','Clan Uchiha');
        $spreadsheet->getActiveSheet()->setCellValue('J4','Konohagakure No Sato');
        $spreadsheet->getActiveSheet()->setCellValue('K4','dalam-kota');
        $spreadsheet->getActiveSheet()->setCellValue('L4','XII RPL 1');
        $spreadsheet->getActiveSheet()->setCellValue('M4','2021/2022');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:N4')->applyFromArray($styleAlignment);
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

        $spreadsheet->setActiveSheetIndex(1)->setTitle('Data Keluarga Siswa');

        $spreadsheet->getActiveSheet()->setCellValue('A1','No.');
        $spreadsheet->getActiveSheet()->setCellValue('B1','NISN');
        $spreadsheet->getActiveSheet()->setCellValue('C1','Nama Siswa');
        $spreadsheet->getActiveSheet()->setCellValue('D1','Nama Keluarga/Saudara');

        $spreadsheet->getActiveSheet()->setCellValue('A2','1');
        $spreadsheet->getActiveSheet()->setCellValue('B2','00088899912');
        $spreadsheet->getActiveSheet()->setCellValue('C2','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D2','Uchiha Tiara');

        $spreadsheet->getActiveSheet()->setCellValue('A3','2');
        $spreadsheet->getActiveSheet()->setCellValue('B3','00088899913');
        $spreadsheet->getActiveSheet()->setCellValue('C3','Uchiha Tiara');
        $spreadsheet->getActiveSheet()->setCellValue('D3','Uchiha Bayu');
        $spreadsheet->getActiveSheet()->setCellValue('D4','Uchiha Sukirman');

        $spreadsheet->getActiveSheet()->mergeCells('A3:A4');
        $spreadsheet->getActiveSheet()->mergeCells('B3:B4');
        $spreadsheet->getActiveSheet()->mergeCells('C3:C4');

        $styleAlignment = [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ]];

        $spreadsheet->getActiveSheet()->getStyle('A1:D4')->applyFromArray($styleAlignment);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        $writer->save('php://output');
    }

    public function import(Request $request)
    {
        session()->forget('import_siswa');
        $file_import = $request->file_import;

        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($file_import);

        foreach ($reader->getSheetIterator() as $sheet) {
            if ($sheet->getIndex() === 0) {
                foreach ($sheet->getRowIterator() as $num => $row) {
                    if ($num > 1) {
                        $cells = $row->getCells();
                        $data_siswa = [
                            'nisn'            => $cells[1]->getValue(),
                            'nama_siswa'      => $cells[2]->getValue(),
                            'slug_siswa'      => Str::slug($cells[2]->getValue(),'-'),
                            'jenis_kelamin'   => $cells[3]->getValue(),
                            'tanggal_lahir'   => import_date_excel($cells[4]->getValue()),
                            'nama_ayah'       => $cells[5]->getValue(),
                            'nama_ibu'        => $cells[6]->getValue(),
                            'nomor_orang_tua' => $cells[7]->getValue(),
                            'asal_kelompok'   => $cells[8]->getValue(),
                            'asal_wilayah'    => $cells[9]->getValue(),
                            'wilayah'         => Str::slug($cells[10]->getValue(),'-'),
                            'status_delete'   => 0
                        ];
                        // dd(Siswa::where('nisn',$cells[1]->getValue())->where('status_delete',0)->count());
                        if (Siswa::where('nisn',$cells[1]->getValue())->where('status_delete',0)->count() == 0) {
                            Siswa::updateOrCreate($data_siswa);

                            $id_siswa = Siswa::where('nisn',$cells[1]->getValue())->get()[0]->id_siswa;
                        }
                        else {
                            $id_siswa = Siswa::where('nisn',$cells[1]->getValue())->get()[0]->id_siswa;
                        }

                        $check_kelas = Kelas::where('slug_kelas',Str::slug($cells[11]->getValue(),'-'))
                                            ->where('status_delete',0)->count();

                        if ($check_kelas == 0) {
                            return redirect('/admin/siswa/import')->with('log','Kelas '.$cells[11]->getValue().' tidak ditemukan! mohon cek kembali data kelas');
                        }
                        else {
                            $id_kelas = Kelas::where('slug_kelas',Str::slug($cells[11]->getValue(),'-'))->where('status_delete',0)->get()[0]->id_kelas;
                        }

                        $check_tahun_ajaran = TahunAjaran::where('tahun_ajaran',$cells[12]->getValue())->where('status_delete',0)->count();
                        if ($check_tahun_ajaran == 0) {
                            return redirect('/admin/siswa/import')->with('log','Tahun Ajaran '.$cells[12]->getValue().' tidak ditemukan! mohon cek kembali data tahun ajaran');
                        }
                        else {
                            $id_tahun_ajaran = TahunAjaran::where('tahun_ajaran',$cells[12]->getValue())->where('status_delete',0)->get()[0]->id_tahun_ajaran;
                        }

                        $check_kelas_siswa = KelasSiswa::where('id_kelas',$id_kelas)
                                                        ->where('id_tahun_ajaran',$id_tahun_ajaran)
                                                        ->where('id_siswa',$id_siswa)
                                                        ->count();
                                                        
                        if ($check_kelas_siswa == 0) {
                            $data_kelas_siswa = [
                                'id_siswa'        => $id_siswa,
                                'id_kelas'        => $id_kelas,
                                'id_tahun_ajaran' => $id_tahun_ajaran,
                                'status_delete'   => 0
                            ];
                            KelasSiswa::firstOrCreate($data_kelas_siswa);
                        }

                        $data_user = [
                            'name'          => 'Ortu '.$cells[2]->getValue(),
                            'username'      => $cells[1]->getValue(),
                            'password'      => bcrypt($cells[1]->getValue()),
                            'level_user'    => 0,
                            'status_akun'   => 1,
                            'status_delete' => 0
                        ];

                        User::firstOrCreate($data_user);
                    }
                }
            }
        }

        $id_siswa_ = '';
        foreach ($reader->getSheetIterator() as $sheet) {
            if ($sheet->getIndex() === 1) {
                foreach ($sheet->getRowIterator() as $num => $row) {
                    if ($num > 1) {
                        $cells = $row->getCells();
                        if ($cells[1]->getValue() != '' && $cells[2]->getValue() != '') {
                            $check_siswa = Siswa::where('nisn',$cells[1]->getValue())->count();
                            // dd($check_siswa);
                            if ($check_siswa == 0) {
                                return redirect('admin/siswa/import/')->with('log','Siswa '.$cells[2]->getValue().' tidak ditemukan di sheet Data Keluarga! mohon cek kembali data siswa');
                            }
                            else {
                                $id_siswa_ = Siswa::where('nisn',$cells[1]->getValue())->get()[0]->id_siswa;
                            }
                        }
                        else {
                            $id_siswa_ = session()->get('import_siswa')['id_siswa'];
                        }
                        
                        $check_siswa_keluarga = Siswa::where('slug_siswa',Str::slug($cells[2]->getValue(),'-'))->count();
                        if ($check_siswa_keluarga == 0) {
                            return redirect('/admin/siswa/import')->with('log','Siswa '.$cells[2]->getValue().' tidak ditemukan di sheet Data Keluarga! mohon cek kembali data siswa');
                        }
                        else {
                            $id_siswa_keluarga = Siswa::where('slug_siswa',Str::slug($cells[2]->getValue(),'-'))->get()[0]->id_siswa;
                        }

                        $data_keluarga = [
                            'id_siswa'          => $id_siswa_,
                            'id_siswa_keluarga' => $id_siswa_keluarga
                        ];

                        Keluarga::firstOrCreate($data_keluarga);

                        if (!session()->has('import_siswa')) {
                            session()->put('import_siswa',['id_siswa' => $id_siswa_]);
                        }
                        if (session()->has('import_siswa') && $cells[1]->getValue() != '') {
                            session()->put('import_siswa',['id_siswa' => $id_siswa_]);   
                        }
                    }
                }
            }
        }

        $reader->close();

        return redirect('/admin/siswa')->with('message','Berhasil Import Siswa');
    }
}
