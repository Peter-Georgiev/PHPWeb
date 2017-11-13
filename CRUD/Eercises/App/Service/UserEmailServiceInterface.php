<?php

namespace App\Service;

use App\Data\UserEmailDTO;

interface UserEmailServiceInterface
{
    /** @return \Generator|UserEmailDTO[] */
    public function findAllUserEmail(): \Generator;

    /** @return \Generator|UserEmailDTO[] */

    public function findOneEmail(int $id): \Generator;
}