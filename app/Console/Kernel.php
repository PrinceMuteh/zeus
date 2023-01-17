<?php

namespace App\Console;

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
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->hourly();
        $schedule->command('hello:world')->everyThirtyMinutes();


        // $schedule->call(function () {
        //     $controller = new \App\Http\Controllers\ScheduleController();
        //     $controller->reportTask();
        //     // info("called every minute");
        // })->everyThirtyMinutes();

        // $schedule->call(function () {
        //     $controller = new \App\Http\Controllers\ScheduleController();
        //     $controller->allVehicleTask();
        //     // info("called every minute");
        // })->everyThirtyMinutes();

        // $schedule->call(function () {
        //     $controller = new \App\Http\Controllers\ScheduleController();
        //     $controller->vehicleStatusTask();
        //     // info("called every minute");
        // })->everyTenMinutes();


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
