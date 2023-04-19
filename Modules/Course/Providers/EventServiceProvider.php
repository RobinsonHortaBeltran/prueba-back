<?php

namespace Modules\Course\Providers;

use Modules\Course\Entities\Course;
use Modules\Course\Observers\CourseObserver;
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
        Course::class => [
            CourseObserver::class
        ],
    ];
}
