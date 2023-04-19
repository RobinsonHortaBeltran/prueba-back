<?php

namespace Modules\AcceptedPayment\Entities\Concerns;

use Carbon\Carbon;

/**
 * En: Get Data Entity Attributes.
 * Es: Obtener atributos entidad de datos.
 *
 * @class   AcceptedPaymentEntityGetAttributeData
 * @package Modules\AcceptedPayment\Entities\Concerns
 */
trait AcceptedPaymentEntityGetAttributeData
{
    /**
     * En: Get the acceptedPayment id.
     * Es: Obtener el id de la unidad.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->getAttribute('id');
    }

    /**
     * En: Get name.
     * Es: Obtener campo de nombre
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }


    /**
     * En: Get Cost Center ID.
     * Es: Obtener id del centro de costos
     *
     * @return string
     */
    public function getCostCenterID(): string
    {
        return $this->getAttribute('cost_center_id');
    }

    /**
     * En: Get rph field.
     * Es: Obtener el campo rph
     *
     * @return string
     */
    public function getRph(): string
    {
        return $this->getAttribute('rph');
    }


    /**
     * En: Get Guarantee Indicator status.
     * Es: Obtener el campo indicador de garantia
     *
     * @return bool
     */
    public function getGuaranteeIndicator(): bool
    {
        return $this->getAttribute('guarantee_indicator');
    }

    /**
     * En: Get Guarantee Type Code field.
     * Es: Obtener el campo codigo tipo de garantia
     *
     * @return string
     */
    public function getGuaranteeTypeCode(): string
    {
        return $this->getAttribute('guarantee_type_code');
    }

    /**
     * En: Get Guarantee id field.
     * Es: Obtener el campo id de garantia
     *
     * @return string
     */
    public function getGuaranteeID(): string
    {
        return $this->getAttribute('guarantee_id');
    }

    /**
     * En: Get Remark field.
     * Es: Obtener el campo Observación
     *
     * @return string
     */
    public function getRemark(): string
    {
        return $this->getAttribute('remark');
    }

    /**
     * En: Get registration status.
     * Es: Obtener el campo de estado.
     *
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->getAttribute('status');
    }

    /**
     * En: Get acceptedPayment creation date.
     * Es: Obtener fecha de creación de la unidad.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute('created_at');
    }

    /**
     * En: Get acceptedPayment update date.
     * Es: Obtener fecha de actualización de la unidad.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute('updated_at');
    }
}
