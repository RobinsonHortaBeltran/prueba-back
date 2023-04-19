<?php

namespace Bookstores\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * En: Data entity repository.
 * Es: Repositorio de entidad de datos.
 *
 * @package EntityRepository
 */
interface EntityRepositoryContract
{
    /**
     * En: Filter resource by client request.
     * Es: Filtrar recurso por solicitud del cliente.
     *
     * @param  array $resource
     * @param  callable $callback
     * @return mixed
     */
    public function filter(array $resource, callable $callback = null);

    /**
     * En: Get all records.
     * Es: Obtener todos los registros.
     *
     * @return Collection<int, static>
     */
    public function getAll(): Collection;

    /**
     * En: Get a record for your id.
     * Es: Obtener un registro por su id.
     *
     * @param string $id
     *
     * @return Model|Collection|Builder
     */
    public function getById(string $id): Model;

    /**
     * En: Create a record.
     * Es: Crear un registro.
     *
     * @param array $details
     *
     * @return Model
     */
    public function create(array $details): Model;

    /**
     * En: Update a record by its id.
     * Es: Actualizar un registro por su id.
     *
     * @param  string $id
     * @param  array  $newDetails
     * @return Model
     */
    public function update(string $id, array $newDetails): Model;

    /**
     * En: Delete a record by its id.
     * Es: Eliminar un registro por su id.
     *
     * @param  string $id
     * @return int
     */
    public function delete(string $id): int;
}