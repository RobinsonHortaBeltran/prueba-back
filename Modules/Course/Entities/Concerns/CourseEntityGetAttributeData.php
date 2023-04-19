<?php

namespace Modules\Course\Entities\Concerns;

use Carbon\Carbon;

/**
 * En: Get Data Entity Attributes.
 * Es: Obtener atributos entidad de datos.
 *
 * @class   CourseEntityGetAttributeData
 * @package Modules\Course\Entities\Concerns
 */
trait CourseEntityGetAttributeData
{
    /**
     * En: Get the course id.
     * Es: Obtener el id del curso.
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
     * En: Get description field.
     * Es: Obtener la descripcion del curso
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * En: Get star date field.
     * Es: Obtener el campo fecha de inicio
     *
     * @return Carbon
     */
    public function getStarDate(): Carbon
    {
        return Carbon::parse($this->getAttribute('start_date'));
    }


    /**
     * En: Get end date field.
     * Es: Obtener el campo de fecha de finalizacion del curso.
     *
     * @return Carbon
     */
    public function getEndDate(): Carbon
    {
        return Carbon::parse($this->getAttribute('end_date'));
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
     * En: Get course creation date.
     * Es: Obtener fecha de creación de la unidad.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute('created_at');
    }

    /**
     * En: Get course update date.
     * Es: Obtener fecha de actualización de la unidad.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute('updated_at');
    }
}
