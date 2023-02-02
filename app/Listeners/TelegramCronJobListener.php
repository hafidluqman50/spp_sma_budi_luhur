<?php

namespace App\Listeners;

use App\Events\TelegramCronJobEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Models\TelegramData;
// use App\Models\Siswa;
// use App\Models\Kelas;
// use App\Models\KelasSiswa;
// use App\Models\TahunAjaran;
// use App\Models\Spp;
// use App\Models\SppBulanTahun;
// use App\Models\SppDetail;
use Telegram;

class TelegramCronJobListener
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
     * @param  \App\Events\TelegramCronJobEvent  $event
     * @return void
     */
    public function handle(TelegramCronJobEvent $event)
    {
        Telegram::sendMessage([
            'chat_id'    => $event->telegram_data['chat_id'],
            'text'       => $event->telegram_data['text'],
            'parse_mode' => 'Markdown'
        ]);
    }
}
