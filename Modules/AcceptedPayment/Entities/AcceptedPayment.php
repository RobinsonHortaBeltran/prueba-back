<?php

namespace Modules\AcceptedPayment\Entities;

use Bookstores\Eloquent\Blueprint;
use Modules\AcceptedPayment\Contracts\AcceptedPaymentEntity;
use Modules\AcceptedPayment\Entities\Concerns\AcceptedPaymentEntityGetAttributeData;

/**
 * En: Data entity of the module.
 * Es: Entidad de datos del módulo.
 *
 * @package Hotel
 */
class AcceptedPayment extends Blueprint implements AcceptedPaymentEntity
{
    use AcceptedPaymentEntityGetAttributeData;

    /**
     * En: The attributes that are mass assignable.
     * Es: Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cost_center_id',
        'rph',
        'guarantee_indicator',
        'guarantee_type_code',
        'guarantee_id',
        'remark',
        'status'
    ];

}

