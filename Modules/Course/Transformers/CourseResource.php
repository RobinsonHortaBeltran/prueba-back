<?php

namespace Modules\Course\Transformers;

use Illuminate\Http\Request;
use Modules\Course\Contracts\CourseEntity;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * En: Collection of resources.
 * Es: Colección de recursos.
 *
 * @package CourseResource
 */
class CourseResource extends JsonResource
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
        /** @var CourseEntity $courseEntity */
        $courseEntity = $this->resource;
        return [
            'id'                    => $courseEntity->getId(),
            'name'                  => $courseEntity->getName(),
            'costCenterId'          => $courseEntity->getCostCenterID(),
            'rph'                   => $courseEntity->getRph(),
            'guaranteeIndicator'    => $courseEntity->getGuaranteeIndicator(),
            'guaranteeTypeCode'     => $courseEntity->getGuaranteeTypeCode(),
            'guaranteeId'           => $courseEntity->getGuaranteeID(),
            'remark'                => $courseEntity->getRemark(),
            'status'                => $courseEntity->getStatus(),
            'createdAt'             => $courseEntity->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt'             => $courseEntity->getUpdatedAt()->format('Y-m-d H:i:s')
        ];
    }
}
