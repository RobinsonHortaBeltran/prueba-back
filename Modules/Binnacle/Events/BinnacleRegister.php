<?php

namespace Modules\Binnacle\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

/**
 * En: Binnacle database process.
 * Es: Proceso de base de datos de bitácora.
 *
 * @package BinnacleRegister
 */
class BinnacleRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * En: Schema of the data that is stored in the log table.
     * Es: Esquema de los datos que se almacenan en la tabla de registro.
     *
     * @var array
     */
    public array $data;

    /**
     * En: Create a new event instance.
     * Es: Cree una nueva instancia de evento.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
