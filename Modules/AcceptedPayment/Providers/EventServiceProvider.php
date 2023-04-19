<?php

namespace Modules\AcceptedPayment\Providers;

use Modules\AcceptedPayment\Entities\AcceptedPayment;
use Modules\AcceptedPayment\Observers\AcceptedPaymentObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * En: Event service provider.
 * Es: Proveedor de servicios de eventos.
 *
 * @package EventServiceProvider
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * En: The model observers for your application.
     * Es: Los observadores del modelo para su aplicación.
     *
     * @var array
     */
    protected $observers = [
        AcceptedPayment::class => [
            AcceptedPaymentObserver::class
        ],
    ];
}
