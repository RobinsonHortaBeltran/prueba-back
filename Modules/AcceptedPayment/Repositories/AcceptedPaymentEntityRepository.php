<?php

namespace Modules\AcceptedPayment\Repositories;

use Modules\AcceptedPayment\Entities\AcceptedPayment;
use Bookstores\Repositories\EntityRepository;
use Modules\AcceptedPayment\Contracts\AcceptedPaymentEntityRepository as AcceptedPaymentEntityRepositoryContract;

/**
 * En: Data entity repository.
 * Es: Repositorio entidad de datos.
 *
 * @package AcceptedPaymentEntityRepository
 */
class AcceptedPaymentEntityRepository extends EntityRepository implements AcceptedPaymentEntityRepositoryContract
{
    /**
     * En: Set data entity.
     * Es: Establecer entidad de datos.
     *
     * @return string
     */
    public function setEntity(): string {
        return AcceptedPayment::class;
    }
}
