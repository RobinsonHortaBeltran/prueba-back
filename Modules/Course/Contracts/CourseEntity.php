<?php

namespace Modules\Course\Contracts;

use Carbon\Carbon;

/**
 * En: Data entity contract.
 * Es: Contrato entidad de datos.
 *
 * @package HotelEntity
 */
interface CourseEntity
{
    /**
     * En: Get the course id.
     * Es: Obtener el id de la unidad.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * En: Get name.
     * Es: Obtener campo de nombre
     *
     * @return string
     */
    public function getName(): string;

    /**
     * En: Get Cost Center ID.
     * Es: Obtener id del centro de costos
     *
     * @return string
     */
    public function getCostCenterID(): string;

    /**
     * En: Get rph field.
     * Es: Obtener el campo rph
     *
     * @return string
     */
    public function getRph(): string;


    /**
     * En: Get GuaranteeIndicator status.
     * Es: Obtener el campo de estado.
     *
     * @return bool
     */
    public function getGuaranteeIndicator(): bool;

    /**
     * En: Get Guarantee Type Code field.
     * Es: Obtener el campo codigo tipo de garantia
     *
     * @return string
     */
    public function getGuaranteeTypeCode(): string;

    /**
     * En: Get Guarantee id field.
     * Es: Obtener el campo id de garantia
     *
     * @return string
     */
    public function getGuaranteeID(): string;

    /**
     * En: Get Remark field.
     * Es: Obtener el campo Observación
     *
     * @return string
     */
    public function getRemark(): string;

    /**
     * En: Get registration status.
     * Es: Obtener el campo de estado.
     *
     * @return bool
     */
    public function getStatus(): bool;

    /**
     * En: Get course creation date.
     * Es: Obtener fecha de creación de la unidad.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * En: Get course update date.
     * Es: Obtener fecha de actualización de la unidad.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon;
}


