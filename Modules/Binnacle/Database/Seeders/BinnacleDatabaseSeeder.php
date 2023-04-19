<?php

namespace Modules\Binnacle\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * En: Data seeder for the log table.
 * Es: Sembradora de datos para la tabla de bitácora.
 *
 * @package Modules\Binnacle\Database\Seeders
 */
class BinnacleDatabaseSeeder extends Seeder
{
    /**
     * En: Run the database seeds.
     * Es: Ejecute las semillas de la base de datos.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();
    }
}
