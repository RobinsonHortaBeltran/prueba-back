<?php

namespace Modules\Binnacle\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Modules\Binnacle\Events\BinnacleRegister;

/**
 * En: Logbook assistant.
 * Es: Ayudante del registro de bitácora.
 *
 * @package Binnacle
 */
class Binnacle
{
    /**
     * En: Record resource changes in the logbook.
     * Es: Registrar los cambios del recurso en el registro de bitácora.
     * 
     * @param  Model  $model
     * @param  string $typeAction
     * @return void
     */
    public function register(Model $model, string $typeAction): void
    {
        if (is_null($model->id)) return;
        BinnacleRegister::dispatch([
            'table'       => $model->getTable(),
            'primary_key' => $model->getId(),
            'type_action' => $typeAction,
            'data'        => $model->toArray(),
            'user_id'     => Config::get('user.generic.database.id'),
            'modified'    => $model->getCreatedAt()
        ]);
    }
}
