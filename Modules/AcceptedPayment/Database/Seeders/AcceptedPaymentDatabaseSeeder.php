<?php

namespace Modules\AcceptedPayment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\AcceptedPayment\Contracts\AcceptedPaymentEntityRepository;

/**
 * En: Load initial data into the entity.
 * Es: Cargar datos iniciales en la entidad.
 *
 * @class   AcceptedPaymentDatabaseSeeder
 * @package Modules\AcceptedPayment\Database\Seeders
 */
class AcceptedPaymentDatabaseSeeder extends Seeder
{
    /**
     * En: Run the database seeds.
     * Es: Ejecute las semillas de la base de datos.
     *
     * @param  AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository
     * @return void
     */
    public function run(AcceptedPaymentEntityRepository $acceptedPaymentEntityRepository): void
    {
        Model::unguard();
        $acceptedPayments = [
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
        foreach ($acceptedPayments as $acceptedPayment) {
            $acceptedPaymentEntityRepository->create($acceptedPayment);
        }
    }
}
