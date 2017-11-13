<?php

namespace TaskManagement\Repository;

use TaskManagement\DTO\TaskDTO;

interface TaskRepositoryInterface
{
    public function insert(TaskDTO $task): bool;

    public function update(TaskDTO $task, int $id): bool;

    public function delete(int $id): bool;

    public function findOne(int $id): TaskDTO;
}