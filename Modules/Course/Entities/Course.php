<?php

namespace Modules\Course\Entities;

use Bookstores\Eloquent\Blueprint;
use Modules\Course\Contracts\CourseEntity;
use Modules\Course\Entities\Concerns\CourseEntityGetAttributeData;

/**
 * En: Data entity of the module.
 * Es: Entidad de datos del módulo.
 *
 * @package Hotel
 */
class Course extends Blueprint implements CourseEntity
{
    use CourseEntityGetAttributeData;

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

