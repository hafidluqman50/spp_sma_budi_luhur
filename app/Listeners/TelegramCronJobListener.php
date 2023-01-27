<?php

namespace App\Listeners;

use App\Events\TelegramCronJobEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\TelegramData;
use App\Models\Siswa;
use App\Models\KelasSiswa;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
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
        $update       = Telegram::commandsHandler(true);
        $chat_id      = $update->getChat()->getId();
        $username     = $update->getChat()->getFirstName();
        $get_message  = $update->getMessage()->getText();

        $get_telegram = TelegramData::all();

        foreach ($get_telegram as $key => $value) {
            $message_text = '';
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text'    => $message_text
            ]);
        }
    }
}
