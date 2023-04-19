<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Course\Contracts\CourseEntityRepository;

/**
 * En: Load initial data into the entity.
 * Es: Cargar datos iniciales en la entidad.
 *
 * @class   CourseDatabaseSeeder
 * @package Modules\Course\Database\Seeders
 */
class CourseDatabaseSeeder extends Seeder
{
    /**
     * En: Run the database seeds.
     * Es: Ejecute las semillas de la base de datos.
     *
     * @param  CourseEntityRepository $courseEntityRepository
     * @return void
     */
    public function run(CourseEntityRepository $courseEntityRepository): void
    {
        Model::unguard();
        $courses = [
            [
                'name'                => 'Accepted payment 1',
                'costCenterId'        => '1',
                'rph'                 => '1',
                'guaranteeIndicator'  => true,
                'guaranteeTypeCode'   => '1',
                'guaranteeId'         => '1',
                'remark'              => 'Observacion 1',
                'status'              => true
            ],
            [
                'name'                => 'Accepted payment 2',
                'costCenterId'        => '2',
                'rph'                 => '2',
                'guaranteeIndicator'  => true,
                'guaranteeTypeCode'   => '2',
                'guaranteeId'         => '2',
                'remark'              => 'Observacion 2',
                'status'              => true
            ],
            [
                'name'                => 'Accepted payment 3',
                'costCenterId'        => '3',
                'rph'                 => '3',
                'guaranteeIndicator'  => true,
                'guaranteeTypeCode'   => '3',
                'guaranteeId'         => '3',
                'remark'              => 'Observacion 3',
                'status'              => true
            ],
            [
                'name'                => 'Accepted payment 4',
                'costCenterId'        => '4',
                'rph'                 => '4',
                'guaranteeIndicator'  => true,
                'guaranteeTypeCode'   => '4',
                'guaranteeId'         => '4',
                'remark'              => 'Observacion 4',
                'status'              => true
            ],
            [
                'name'                => 'Accepted payment 5',
                'costCenterId'        => '5',
                'rph'                 => '5',
                'guaranteeIndicator'  => true,
                'guaranteeTypeCode'   => '5',
                'guaranteeId'         => '5',
                'remark'              => 'Observacion 5',
                'status'              => true
            ],
        ];
        foreach ($courses as $course) {
            $courseEntityRepository->create($course);
        }
    }
}
