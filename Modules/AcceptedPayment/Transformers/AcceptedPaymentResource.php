<?php

namespace Modules\AcceptedPayment\Transformers;

use Illuminate\Http\Request;
use Modules\AcceptedPayment\Contracts\AcceptedPaymentEntity;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * En: Collection of resources.
 * Es: Colección de recursos.
 *
 * @package AcceptedPaymentResource
 */
class AcceptedPaymentResource extends JsonResource
{
    /**
     * En: Transform the resource into an array.
     * Es: Transforma el recurso en un array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var AcceptedPaymentEntity $acceptedPaymentEntity */
        $acceptedPaymentEntity = $this->resource;
        return [
            'id'                    => $acceptedPaymentEntity->getId(),
            'name'                  => $acceptedPaymentEntity->getName(),
            'costCenterId'          => $acceptedPaymentEntity->getCostCenterID(),
            'rph'                   => $acceptedPaymentEntity->getRph(),
            'guaranteeIndicator'    => $acceptedPaymentEntity->getGuaranteeIndicator(),
            'guaranteeTypeCode'     => $acceptedPaymentEntity->getGuaranteeTypeCode(),
            'guaranteeId'           => $acceptedPaymentEntity->getGuaranteeID(),
            'remark'                => $acceptedPaymentEntity->getRemark(),
            'status'                => $acceptedPaymentEntity->getStatus(),
            'createdAt'             => $acceptedPaymentEntity->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt'             => $acceptedPaymentEntity->getUpdatedAt()->format('Y-m-d H:i:s')
        ];
    }
}
