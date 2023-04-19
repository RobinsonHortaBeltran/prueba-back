<?php

namespace Modules\AcceptedPayment\Observers;

use Modules\Binnacle\Helpers\Binnacle;
use Modules\AcceptedPayment\Entities\AcceptedPayment as AcceptedPaymentEntity;

/**
 * En: Observe the events of the data entity.
 * Es: Observar los eventos de la entidad de datos.
 *
 * @package HotelObserver
 */
class AcceptedPaymentObserver
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
     * En: Handle the acceptedPayment "created" event.
     * Es: Maneja el evento de multiunidad "creado".
     *
     * @param  AcceptedPaymentEntity  $acceptedPaymentEntity
     * @return void
     */
    public function created(AcceptedPaymentEntity $acceptedPaymentEntity): void
    {
        $this->binnacle->register($acceptedPaymentEntity, __FUNCTION__);
    }

    /**
     * En: Handle the acceptedPayment "updated" event.
     * Es: Maneja el evento "actualizado" del multiunidad.
     *
     * @param  AcceptedPaymentEntity  $acceptedPaymentEntity
     * @return void
     */
    public function updated(AcceptedPaymentEntity $acceptedPaymentEntity): void
    {
        $this->binnacle->register($acceptedPaymentEntity, __FUNCTION__);
    }

    /**
     * En: Handle the acceptedPayment "deleted" event.
     * Es: Maneja el evento de multiunidad "borrado".
     *
     * @param  AcceptedPaymentEntity  $acceptedPaymentEntity
     * @return void
     */
    public function deleted(AcceptedPaymentEntity $acceptedPaymentEntity): void
    {
        $this->binnacle->register($acceptedPaymentEntity, __FUNCTION__);
    }

    /**
     * En: Handle the acceptedPayment "restored" event.
     * Es: Maneja el evento de Usuario "restaurado".
     *
     * @param  AcceptedPaymentEntity  $acceptedPaymentEntity
     * @return void
     */
    public function restored(AcceptedPaymentEntity $acceptedPaymentEntity): void
    {
        $this->binnacle->register($acceptedPaymentEntity, __FUNCTION__);
    }

    /**
     * En: Handle the acceptedPayment "forceDeleted" event.
     * Es: Maneja el evento "forceDeleted" del multiunidad.
     *
     * @param  AcceptedPaymentEntity  $acceptedPaymentEntity
     * @return void
     */
    public function forceDeleted(AcceptedPaymentEntity $acceptedPaymentEntity): void
    {
        $this->binnacle->register($acceptedPaymentEntity, __FUNCTION__);
    }
}
