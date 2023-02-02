<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
// use App\Jobs\TelegramCronJob;
// use App\Models\TelegramData;
// use App\Models\Siswa;
// use App\Models\Spp;
// use App\Models\KelasSiswa;
// use App\Models\SppBulanTahun;
// use App\Models\SppDetail;
use App\Helper\TelegramHelper;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->job(new TelegramCronJob)->monthly();
        $schedule->call(function(){
            TelegramHelper::queueJobTelegram();
        })->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
