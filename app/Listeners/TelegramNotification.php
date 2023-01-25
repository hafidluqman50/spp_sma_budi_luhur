<?php

namespace App\Listeners;

use App\Events\TelegramEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $update   = Telegram::commandsHandler(true);
        $chat_id  = $update->getChat()->getId();
        $username = $update->getChat()->getFirstName();

        if ($update->getMessage()->getText() == '/start') {
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text'    => 'Test Event Laravel'
            ]);
        }
    }
}
