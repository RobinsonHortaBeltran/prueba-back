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
     * Es: Obtener el id del curso .
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
     * En: Get description field.
     * Es: Obtener la descripcion del curso
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * En: Get star date field.
     * Es: Obtener el campo fecha de inicio
     *
     * @return Carbon
     */
    public function getStarDate(): Carbon;


    /**
     * En: Get end date field.
     * Es: Obtener el campo de fecha de finalizacion del curso.
     *
     * @return Carbon
     */
    public function getEndDate(): Carbon;



    /**
     * En: Get status field.
     * Es: Obtener el campo de estado.
     *
     * @return bool
     */
    public function getStatus(): bool;

    /**
     * En: Get course creation date.
     * Es: Obtener fecha de creación del curso.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * En: Get course update date.
     * Es: Obtener fecha de actualización del curso.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon;
}


