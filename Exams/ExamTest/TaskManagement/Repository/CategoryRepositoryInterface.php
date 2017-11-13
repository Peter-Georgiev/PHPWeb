<?php

namespace TaskManagement\Repository;

use TaskManagement\DTO\CategoryDTO;

interface CategoryRepositoryInterface
{
    /** @return \Generator|CategoryDTO[] */
    public function findAll(): \Generator;

    public function findOne(int $id): CategoryDTO;
}