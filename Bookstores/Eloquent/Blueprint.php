<?php

namespace Bookstores\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Bookstores\Eloquent\Concerns\HasMap;
use Bookstores\Eloquent\Concerns\HasEloquentFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * En: Centralize methods on data entities.
 * Es: Centralizar los métodos en las entidades de datos.
 *
 * Class    Blueprint
 * @package App\Models
 */
abstract class Blueprint extends Model
{
    use HasEloquentFilter, HasMap, HasFactory;
}
