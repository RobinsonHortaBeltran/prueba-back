<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * En: Define the application's command schedule.
     * Es: Definir el programa de comandos de la aplicación.
     *
     * @param  Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }

    /**
     * En: Register the commands for the application.
     * Es: Registrar los comandos para la aplicación.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        /** @noinspection PhpIncludeInspection */ require base_path(
            'routes/console.php'
        );
    }
}
