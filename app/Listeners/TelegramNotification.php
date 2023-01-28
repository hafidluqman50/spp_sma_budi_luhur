<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TelegramEvents;
use App\Models\TelegramData;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\TahunAjaran;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use Telegram;

class TelegramNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TelegramEvents  $event
     * @return void
     */
    public function handle(TelegramEvents $event)
    {
        $update      = Telegram::commandsHandler(true);
        $chat_id     = $update->getChat()->getId();
        $username    = $update->getChat()->getFirstName();
        $get_message = $update->getMessage()->getText();

        if ($get_message == '/start') {
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text'    => 'Masukkan Nomor Hp Orang Tua'
            ]);

            $data_telegram = [
                'chat_id'  => $chat_id,
                'text'     => 'start',
                'nomor_hp' => null
            ];

            TelegramData::create($data_telegram);
        }

        if ($get_message == '/info_tunggakan') {
            $check = TelegramData::where('chat_id',$chat_id)->where('nomor_hp','!=',null)->count();
            if ($check > 0) {
                // TelegramData::where('chat_id',$chat_id)->update(['text' => 'info_tunggakan']);

                $get_row   = TelegramData::where('chat_id',$chat_id)->firstOrFail();
                $get_siswa = Siswa::where('nomor_hp_ortu',$get_row->nomor_hp)->get();
                $message = '';
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
                                                         ->where('id_kelas_siswa',$v->id_kelas_siswa)
                                                         ->get();

                        foreach ($spp_bulan_tahun as $index => $data) {
                            $jumlah_tunggakan_bulan = SppDetail::where('id_spp_bulan_tahun',$data->id_spp_bulan_tahun)
                                                                ->sum('sisa_bayar');

                            $message .= 'Bulan, Tahun : *'.$data->bulan_tahun.'* 
Jumlah Tunggakan : *'.format_rupiah($jumlah_tunggakan_bulan).'*

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

                Telegram::sendMessage([
                    'chat_id'    => $chat_id,
                    'text'       => $message,
                    'parse_mode' => 'Markdown'
                ]);
            }
            else {
                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text'    => 'Maaf Silahkan Daftarkan Nomor Hp Ortu Terlebih Dahulu!,
Silahkan Ketik /start lalu tekan enter, kemudian masukkan nomor ortu sesuai dengan nomor yang terdata di aplikasi spp!'
                ]);
            }
        }

        $check = TelegramData::where('chat_id',$chat_id)->where('text','start')->count();
        if ($check > 0) {
            $check_numeric = is_numeric($get_message);
            if ($check_numeric) {
                TelegramData::where('chat_id',$chat_id)->update(['text' => 'terdaftar', 'nomor_hp' => $get_message]);
                
                $text_message = 'Nomor Hp Orang Tua Telah Terdata Untuk Notifikasi,
                
*Mohon Dipantau Tiap Bulan Bot Telegram Ini Untuk Mendapatkan Notifikasi Tunggakan Siswa*,

*Mohon Hubungi Nomor Petugas SPP Berikut Bila Mengalami Kendala Terkait Pembayaran 

Via WA ataupun Telepon : *```082331567930```

_Terima kasih :)_';
                
                Telegram::sendMessage([
                    'chat_id'    => $chat_id,
                    'text'       => $text_message,
                    'parse_mode' => 'Markdown'
                ]);
            }
        }
    }
}
