<?php

namespace Bookstores\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * En: Data entity repository.
 * Es: Repositorio de entidad de datos.
 *
 * @package EntityRepository
 */
abstract class EntityRepository
{
    /**
     * En: Data entity to use in the repository.
     * Es: Entidad de datos a utilizar en el repositorio.
     *
     * @var Mixed
     */
    protected $entity;

    /**
     * En: Bind repository instance to data entity.
     * Es: Enlazar instancia de repositorio con la entidad de datos.
     *
     * @param  App $app
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function __construct(App $app)
    {
        $instance = $this->setEntity();
        $model    = new $instance(); if (!$model instanceof Model) {
            $this->entity = $model; return;
        }
        $this->entity = $app->make($this->setEntity());
        if (!$this->entity instanceof Model) {
            throw new Exception(
                'The class of '.get_class($this->entity).' is not an instance of '.Model::class
            );
        }
    }

    /**
     * En: Set data entity.
     * Es: Establecer entidad de datos.
     *
     * @return string
     */
    abstract public function setEntity(): string;

    /**
     * En: Filter resource by client request.
     * Es: Filtrar recurso por solicitud del cliente.
     *
     * @param  array $resource
     * @param  callable $callback
     * @return mixed
     */
    public function filter(array $resource, callable $callback = null)
    {
        return $this->entity->filter(
            $resource, $callback
        );
    }

    /**
     * En: Get all records.
     * Es: Obtener todos los registros.
     *
     * @return Collection<int, static>
     */
    public function getAll(): Collection
    {
        return $this->entity->all();
    }

    /**
     * En: Get a record for your id.
     * Es: Obtener un registro por su id.
     *
     * @param string $id
     *
     * @return Model|Collection|Builder
     */
    public function getById(string $id): Model
    {
        return $this->entity->findOrFail($id);
    }

    /**
     * En: Create a record.
     * Es: Crear un registro.
     *
     * @param array $details
     *
     * @return Model
     */
    public function create(array $details): Model
    {
        return $this->entity->create(convert_array_keys__to_snake_case(
            $details
        ));
    }

    /**
     * En: Update a record by its id.
     * Es: Actualizar un registro por su id.
     *
     * @param  string $id
     * @param  array  $newDetails
     * @return Model
     */
    public function update(string $id, array $newDetails): Model
    {
        $this->entity
            ->whereId($id)
            ->update(convert_array_keys__to_snake_case($newDetails));
        return $this->entity->whereId($id)->first();
    }

    /**
     * En: Delete a record by its id.
     * Es: Eliminar un registro por su id.
     *
     * @param  string $id
     * @return int
     */
    public function delete(string $id): int
    {
        return $this->entity->destroy($id);
    }
}
