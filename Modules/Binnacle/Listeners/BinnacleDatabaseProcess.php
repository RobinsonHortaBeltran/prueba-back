<?php

namespace Modules\Binnacle\Listeners;

use Modules\Binnacle\Entities\Binnacle;
use Modules\Binnacle\Events\BinnacleRegister;

/**
 * En: Binnacle database process.
 * Es: Proceso de base de datos de bitácora.
 *
 * @package Modules\Binnacle\Listeners\BinnacleDatabaseProcess
 */
class BinnacleDatabaseProcess
{
    /**
     * En: Handle the event.
     * Es: Manejar el evento.
     *
     * @param BinnacleRegister $event
     * @return void
     */
    public function handle(BinnacleRegister $event): void
    {
        Binnacle::create($event->data);
    }
}
