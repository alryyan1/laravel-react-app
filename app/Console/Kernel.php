<?php

namespace App\Console;

use App\Models\Whatsapp;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
//        $schedule->command('backup:clean')->daily()->at('03:42');
        $schedule->command('backup:run --only-db');
        $schedule->call(function () {
            \Log::info('Scheduler is working!');
        })->everyMinute();

//        $schedule->command('backup:run')->daily()->at('03:42')->onSuccess(function (){
//            Whatsapp::sendMsgWb('249991961111','backup had completed');
//        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
