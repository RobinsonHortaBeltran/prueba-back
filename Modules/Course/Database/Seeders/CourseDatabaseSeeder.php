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
                'name'                => 'Programacion 1',
                'description'         => 'Descripcion del curso de programacion 1',
                'startDate'           => now()->toDateString(),
                'endDate'             => now()->toDateString(),
                'status'              => true
            ],
            [
                'name'                => 'Programacion 2',
                'description'         => 'Descripcion del curso de programacion 2',
                'startDate'           => now()->toDateString(),
                'endDate'             => now()->toDateString(),
                'status'              => true
            ]
        ];
        foreach ($courses as $course) {
            $courseEntityRepository->create($course);
        }
    }
}
