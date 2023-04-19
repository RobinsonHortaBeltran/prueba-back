<?php

namespace Modules\Course\Repositories;

use Modules\Course\Entities\Course;
use Bookstores\Repositories\EntityRepository;
use Modules\Course\Contracts\CourseEntityRepository as CourseEntityRepositoryContract;

/**
 * En: Data entity repository.
 * Es: Repositorio entidad de datos.
 *
 * @package CourseEntityRepository
 */
class CourseEntityRepository extends EntityRepository implements CourseEntityRepositoryContract
{
    /**
     * En: Set data entity.
     * Es: Establecer entidad de datos.
     *
     * @return string
     */
    public function setEntity(): string {
        return Course::class;
    }
}
