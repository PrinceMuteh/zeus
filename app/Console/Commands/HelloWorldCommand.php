<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloWorldCommand extends Command {
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'hello:world';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Command description';

    /**
    * Execute the console command.
    *
    * @return int
    */

    public function handle() {
        // info( 'Hello world' );
        sleep( 10 );

        info( 'all Vehicle start' );

        $controller = new \App\Http\Controllers\ScheduleController();
        $controller->allVehicleTask();
        info( 'all Vehicle Done' );

        $controller = new \App\Http\Controllers\ScheduleController();
        $controller->reportTask();
        info( 'all Vehicle Done' );

        sleep( 2000 );

        $controller = new \App\Http\Controllers\ScheduleController();
        $controller->vehicleStatusTask();
        sleep( 6000 );

        return 0;
    }
}
