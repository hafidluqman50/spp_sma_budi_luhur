<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\TelegramEvents;
use App\Listeners\TelegramNotification;
use App\Events\TelegramCronJobEvent;
use App\Listeners\TelegramCronJobListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TelegramEvents::class => [
            TelegramNotification::class
        ],
        TelegramCronJobEvent::class => [
            TelegramCronJobListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(
        //     TelegramEvents::class
        // );

        // Event::listen(function(TelegramEvents $events){
        //     echo "oke";
        // });
    }
}
