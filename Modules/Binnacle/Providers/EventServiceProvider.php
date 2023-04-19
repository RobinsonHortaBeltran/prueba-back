<?php

namespace Modules\Binnacle\Providers;

use Modules\Binnacle\Events\BinnacleRegister;
use Modules\Binnacle\Listeners\BinnacleDatabaseProcess;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * En: Event service provider log module.
 * Es: Proveedor de servicios de eventos módulo de bitácora.
 *
 * @package EventServiceProvider
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * En: The event listener mappings for the application.
     * Es: Las asignaciones de detectores de eventos para la aplicación.
     *
     * @var array
     */
    protected $listen = [
        BinnacleRegister::class => [
            BinnacleDatabaseProcess::class
        ]
    ];
}
