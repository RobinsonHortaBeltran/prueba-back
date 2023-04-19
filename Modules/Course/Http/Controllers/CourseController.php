<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Course\Transformers\CourseResource;
use Symfony\Component\HttpFoundation\Response;
use Modules\Course\Contracts\CourseEntityRepository;
use Modules\Course\Http\Requests\CourseValidateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * En: Module controller.
 * Es: Controlador del módulo.
 *
 * @class   CourseController
 * @package Modules\Course\Http\Controllers
 */
class CourseController extends Controller
{
    /**
     * En: Show entity resource list.
     * Es: Mostrar listado de recurso de la entidad.
     *
     * @param  Request $request
     * @param  CourseEntityRepository $courseEntityRepository
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, CourseEntityRepository $courseEntityRepository): AnonymousResourceCollection
    {
        return CourseResource::collection(
            $courseEntityRepository->filter(
                $request->all()
            )
        );
    }

    /**
     * En: Store a resource in the entity.
     * Es: Almacenar un recurso en la entidad.
     *
     * @param  CourseValidateRequest $request
     * @param  CourseEntityRepository $courseEntityRepository
     * @return CourseResource
     */
    public function store(CourseValidateRequest $request, CourseEntityRepository $courseEntityRepository): CourseResource
    {
        return new CourseResource(
            $courseEntityRepository->create(
                $request->all()
            )
        );
    }

    /**
     * En: Show the specified resource.
     * Es: Mostrar el recurso especificado.
     *
     * @param  string $id
     * @param  CourseEntityRepository $courseEntityRepository
     * @return CourseResource
     */
    public function show(string $id, CourseEntityRepository $courseEntityRepository): CourseResource
    {
        return new CourseResource(
            $courseEntityRepository->getById($id)
        );
    }

    /**
     * En: Update the specified resource.
     * Es: Actualizar el recurso especificado.
     *
     * @param  CourseValidateRequest $request
     * @param  string $id
     * @param  CourseEntityRepository $courseEntityRepository
     * @return CourseResource
     */
    public function update(CourseValidateRequest $request, string $id, CourseEntityRepository $courseEntityRepository): CourseResource
    {
        return new CourseResource(
            $courseEntityRepository->update($id, $request->all())
        );
    }

    /**
     * En: Delete the specified resource.
     * Es: Eliminar el recurso especificado.
     *
     * @param  string $id
     * @param  CourseEntityRepository $courseEntityRepository
     * @return JsonResponse
     */
    public function destroy(string $id, CourseEntityRepository $courseEntityRepository): JsonResponse
    {
        return response()->json(
            $courseEntityRepository->delete($id), Response::HTTP_OK
        );
    }
}
