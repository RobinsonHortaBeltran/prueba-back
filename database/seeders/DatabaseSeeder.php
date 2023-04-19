<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Modules\AcceptedPayment\Database\Seeders\AcceptedPaymentDatabaseSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * En: Seed the application's database.
     * Es: Inicia la base de datos de la aplicación.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            AcceptedPaymentDatabaseSeeder::class,

        ]);
    }
}
