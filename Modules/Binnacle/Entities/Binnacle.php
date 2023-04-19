<?php

namespace Modules\Binnacle\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * En: Log table data schema.
 * Es: Esquema de datos de la tabla de bitácora.
 *
 * @package Modules\Binnacle\Entities
 * @method static create(array $data)
 */
class Binnacle extends Model
{
    /**
     * En: The attributes that are mass assignable.
     * Es: Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'table',
        'primary_key',
        'type_action',
        'user_id',
        'data',
        'modified'
    ];

    /**
     * En: The attributes that should be cast.
     * Es: Los atributos que deben emitirse.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array'
    ];

    /**
     * En: Indicates if the model should be timestamped.
     * Es: Indica si el modelo debe tener una marca de tiempo.
     *
     * @var bool
     */
    public $timestamps = false;
}
