<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TelegramEvents;
use App\Models\TelegramData;
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

        $check = TelegramData::where('chat_id',$chat_id)->where('text','start')->count();
        if ($check > 0) {
            $check_numeric = is_numeric($get_message);
            if ($check_numeric) {
                TelegramData::where('chat_id',$chat_id)->update(['nomor_hp' => $get_message]);

                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text'    => 'Nomor Hp Orang Tua Telah Terdata Untuk Notifikasi, Mohon Dipantau Tiap Bulan Bot Telegram Ini Untuk Mendapatkan Notifikasi Tunggakan Siswa, Terima kasih :)'
                ]);
            }
        }
    }
}
