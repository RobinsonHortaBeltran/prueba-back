<?php

namespace Modules\AcceptedPayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\AcceptedPayment\Transformers\AcceptedPaymentResource;
use Symfony\Component\HttpFoundation\Response;
use Modules\AcceptedPayment\Contracts\AcceptedPaymentEntityRepository;
use Modules\AcceptedPayment\Http\Requests\AcceptedPaymentValidateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * En: Module controller.
 * Es: Controlador del módulo.
 *
 * @class   AcceptedPaymentController
 * @package Modules\AcceptedPayment\Http\Controllers
 */
class AcceptedPaymentController extends Controller
{
    /**
     * En: Show entity resource list.
     * Es: Mostrar listado de recurso de la entidad.
     *
     * @param  Request $request
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): AnonymousResourceCollection
    {
        return AcceptedPaymentResource::collection(
            $acceptedPaymentEntityRepository->filter(
                $request->all()
            )
        );
    }

    /**
     * En: Store a resource in the entity.
     * Es: Almacenar un recurso en la entidad.
     *
     * @param  AcceptedPaymentValidateRequest $request
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return AcceptedPaymentResource
     */
    public function store(AcceptedPaymentValidateRequest $request, AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): AcceptedPaymentResource
    {
        return new AcceptedPaymentResource(
            $acceptedPaymentEntityRepository->create(
                $request->all()
            )
        );
    }

    /**
     * En: Show the specified resource.
     * Es: Mostrar el recurso especificado.
     *
     * @param  string $id
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return AcceptedPaymentResource
     */
    public function show(string $id, AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): AcceptedPaymentResource
    {
        return new AcceptedPaymentResource(
            $acceptedPaymentEntityRepository->getById($id)
        );
    }

    /**
     * En: Update the specified resource.
     * Es: Actualizar el recurso especificado.
     *
     * @param  AcceptedPaymentValidateRequest $request
     * @param  string $id
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return AcceptedPaymentResource
     */
    public function update(AcceptedPaymentValidateRequest $request, string $id, AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): AcceptedPaymentResource
    {
        return new AcceptedPaymentResource(
            $acceptedPaymentEntityRepository->update($id, $request->all())
        );
    }

    /**
     * En: Delete the specified resource.
     * Es: Eliminar el recurso especificado.
     *
     * @param  string $id
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return JsonResponse
     */
    public function destroy(string $id, AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): JsonResponse
    {
        return response()->json(
            $acceptedPaymentEntityRepository->delete($id), Response::HTTP_OK
        );
    }
}
