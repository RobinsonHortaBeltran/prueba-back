<?php

namespace Modules\Binnacle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

/**
 * En: Binnacle module controller.
 * Es: Controlador módulo de bitácora.
 *
 * @package BinnacleController
 */
class BinnacleController extends Controller
{
    /**
     * En: Show entity resource list.
     * Es: Mostrar listado de recurso de la entidad.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('binnacle::index');
    }

    /**
     * En: Show the form for creating a new resource.
     * Es: Muestra el formulario para crear un nuevo recurso.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('binnacle::create');
    }

    /**
     * En: Store a resource in the entity.
     * Es: Almacenar un recurso en la entidad.
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request): void
    {

    }

    /**
     * En: Show the specified resource.
     * Es: Mostrar el recurso especificado.
     *
     * @param  int $id
     * @return Renderable
     */
    public function show(int $id): Renderable
    {
        return view('binnacle::show');
    }

    /**
     * En: Show the form for editing the specified resource.
     * Es: Muestra el formulario para editar el recurso especificado.
     *
     * @param  int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        return view('binnacle::edit');
    }

    /**
     * En: Update the specified resource.
     * Es: Actualizar el recurso especificado.
     *
     * @param  Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, int $id): void
    {

    }

    /**
     * En: Delete the specified resource.
     * Es: Eliminar el recurso especificado.
     *
     * @param  int $id
     * @return void
     */
    public function destroy(int $id): void
    {

    }
}
