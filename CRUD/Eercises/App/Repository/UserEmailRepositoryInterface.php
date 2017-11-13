<?php

namespace App\Repository;

use App\Data\UserEmailDTO;

interface UserEmailRepositoryInterface
{
    /** @return \Generator|UserEmailDTO[] */
    public function findAll(): \Generator;

    /** @return \Generator|UserEmailDTO[] */
    public function findByOne(int $id): \Generator;
}