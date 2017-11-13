<?php

namespace TaskManagement\Repository;


use TaskManagement\DTO\TaskDTO;

interface TaskRepositoryInterface
{
    public function count(): int;

    public function findAll(int $limit = 0, int $offset = 0): \Generator;

    public function findOne(int $id): TaskDTO;

    public function insert(TaskDTO $task): bool;

    public function update(TaskDTO $task, int $id): bool;

    public function delete(int $id): bool;
}