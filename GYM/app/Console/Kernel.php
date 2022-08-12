<?php

namespace App\Console;

use App\Console\Commands\ExpireMember;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        \App\Console\Commands\ExpireMember::class,
        \App\Console\Commands\Notify::class,
        // ExpireMember::class,
     ];
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
      
         $schedule->command('member.expire')->everyMinute();
         $schedule->command('Notify:Email')->everyMinute();
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
