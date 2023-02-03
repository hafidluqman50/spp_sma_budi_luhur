<?php 

namespace App\Helper;

use App\Jobs\TelegramCronJob;
use App\Models\TelegramData;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;

class TelegramHelper
{
	
	public function __construct()
	{
		// code...
	}

	public static function queueJobTelegram()
	{
        $get_row    = TelegramData::all();
        $human_date = human_date(date('Y-m-d'));

        $array = [
            0 => ['text'=>'Belum Lunas'],
            1 => ['text'=>'Sudah Lunas']
        ];

        foreach ($get_row as $i => $row) {
	$message   = 'السلام عليكم ورحمة الله وبركاته... 
Bapak Ibu,, mengingatkan ini sudah tanggal '.$human_date.',, bagi Bapak Ibu yg belum membayar bulanan putra/i nya, monggo amal sholeh segera dibayar,, adapun yg masih mempunyai tanggungan di bulan sebelumnya, mohon bisa di Doble dengan bulan ini..
Mengingat ini semua demi kelancaran putra/i bpk ibu d dlm mndok maupun sekolahnya . 😊
Atas perhatian nya, amal sholeh nya,, kami ucapkan syukur Alhamdulillaahi jazaa kumulloohu khoiroo... 🙏🏻 Mugo2 Alloh paring ganti yg lebih banyak, halal, lancar, manfaat, dan barokah... Aamiiin.. 😇🤲🏻
والسلام عليكم ورحمة الله وبركاته...

';

            $get_siswa = Siswa::where('nomor_orang_tua',$row->nomor_hp)->where('status_delete',0)->get();
            foreach ($get_siswa as $key => $value) {
$message .= 'Nama Siswa : *'.$value->nama_siswa.'*

';
                $kelas = Spp::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                    ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                    ->where('id_siswa',$value->id_siswa)
                                    ->get();
                foreach ($kelas as $i => $v) {
$message .= 'Kelas : *'.$v->kelas.'*

Rincian Tunggakan : 

'; 
                    $spp_bulan_tahun = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                                     // ->where('bulan',zero_front_number(date('m')))
                                                     // ->where('tahun',date('Y'))
                                                     ->where('id_kelas_siswa',$v->id_kelas_siswa)
                                                     ->get();

                    foreach ($spp_bulan_tahun as $index => $data) {
                        $jumlah_tunggakan_bulan = SppDetail::where('id_spp_bulan_tahun',$data->id_spp_bulan_tahun)
                                                            ->sum('sisa_bayar');

$message .= 'Bulan, Tahun : *'.$data->bulan_tahun.'*

Status Tunggakan : *'.$array[SppBulanTahun::checkStatus($data->id_spp_bulan_tahun)]['text'].'*

Jumlah Tunggakan : *'.format_rupiah($jumlah_tunggakan_bulan).'*

-------------------------------------

';
                    }

        $sum = SppDetail::join('spp_bulan_tahun','spp_bulan_tahun.id_spp_bulan_tahun','=','spp_detail.id_spp_bulan_tahun')
                        ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                        ->where('id_kelas_siswa',$v->id_kelas_siswa)
                        ->sum('sisa_bayar');

$message .= 'Jumlah Keseluruhan : *'.format_rupiah($sum).'* 
=====================================================

';
                }
            }

            $data_telegram = [
                'chat_id' => $row->chat_id,
                'text'    => $message
            ];
            dispatch(new TelegramCronJob($data_telegram));

            $message = '';
        }
	}
}