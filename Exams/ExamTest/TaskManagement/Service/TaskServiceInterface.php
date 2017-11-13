<?php

namespace TaskManagement\Service;

use TaskManagement\DTO\TaskDTO;

interface TaskServiceInterface
{
    public function add(TaskDTO $task): bool;

    public function edit(TaskDTO $task, int $id): bool;

    public function remove(int $id): bool;

    public function viewPerId(int $id): TaskDTO;
}