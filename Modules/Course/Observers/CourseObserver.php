<?php

namespace Modules\Course\Observers;

use Modules\Binnacle\Helpers\Binnacle;
use Modules\Course\Entities\Course as CourseEntity;

/**
 * En: Observe the events of the data entity.
 * Es: Observar los eventos de la entidad de datos.
 *
 * @package HotelObserver
 */
class CourseObserver
{
    /**
     * En: Handle events after all transactions are committed.
     * Es: Manejar los eventos después de que todas las transacciones sean confirmadas.
     *
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * En: Log record instance.
     * Es: Instancia del registro de bitácora.
     *
     * @var Binnacle
     */
    private Binnacle $binnacle;

    /**
     * En: Create a new event observer instance.
     * Es: Cree una nueva instancia de observador de eventos.
     *
     * @param Binnacle $binnacle
     */
    public function __construct(Binnacle $binnacle) {
        $this->binnacle = $binnacle;
    }

    /**
     * En: Handle the course "created" event.
     * Es: Maneja el evento de multiunidad "creado".
     *
     * @param  CourseEntity  $courseEntity
     * @return void
     */
    public function created(CourseEntity $courseEntity): void
    {
        $this->binnacle->register($courseEntity, __FUNCTION__);
    }

    /**
     * En: Handle the course "updated" event.
     * Es: Maneja el evento "actualizado" del multiunidad.
     *
     * @param  CourseEntity  $courseEntity
     * @return void
     */
    public function updated(CourseEntity $courseEntity): void
    {
        $this->binnacle->register($courseEntity, __FUNCTION__);
    }

    /**
     * En: Handle the course "deleted" event.
     * Es: Maneja el evento de multiunidad "borrado".
     *
     * @param  CourseEntity  $courseEntity
     * @return void
     */
    public function deleted(CourseEntity $courseEntity): void
    {
        $this->binnacle->register($courseEntity, __FUNCTION__);
    }

    /**
     * En: Handle the course "restored" event.
     * Es: Maneja el evento de Usuario "restaurado".
     *
     * @param  CourseEntity  $courseEntity
     * @return void
     */
    public function restored(CourseEntity $courseEntity): void
    {
        $this->binnacle->register($courseEntity, __FUNCTION__);
    }

    /**
     * En: Handle the course "forceDeleted" event.
     * Es: Maneja el evento "forceDeleted" del multiunidad.
     *
     * @param  CourseEntity  $courseEntity
     * @return void
     */
    public function forceDeleted(CourseEntity $courseEntity): void
    {
        $this->binnacle->register($courseEntity, __FUNCTION__);
    }
}
