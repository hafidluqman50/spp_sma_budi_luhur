<?php

namespace App\Listeners;

use App\Events\TelegramEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
        //
    }
}
