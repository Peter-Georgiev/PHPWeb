<?php

namespace App\Repository;

use App\Data\EmailDTO;

interface EmailRepositoryInterface
{
    public function insert($id, EmailDTO $email): bool;

    public function delete($id): bool;

    /** @return \Generator|EmailDTO[] */
    public function findAll(): \Generator;
}