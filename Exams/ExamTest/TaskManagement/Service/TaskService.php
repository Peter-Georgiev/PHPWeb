<?php

namespace TaskManagement\Service;


use TaskManagement\DTO\TaskDTO;
use TaskManagement\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /** @var  TaskRepositoryInterface */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function add(TaskDTO $task): bool
    {
        return $this->taskRepository->insert($task);
    }

    public function edit(TaskDTO $task, int $id): bool
    {
        $taskFromDb = $this->taskRepository->findOne($id);

        if (null === $taskFromDb) {
            throw new \Exception("Task does not exist");
        }

        return $this->taskRepository->update($task, $id);
    }

    public function remove(int $id): bool
    {
        $taskFromDb = $this->taskRepository->findOne($id);

        if (null === $taskFromDb) {
            throw new \Exception("Task does not exist");
        }

        return $this->taskRepository->delete($id);

    }

    public function viewPerId(int $id): TaskDTO
    {
        $taskFromDb = $this->taskRepository->findOne($id);

        if (null === $taskFromDb) {
            throw new \Exception("Task does not exist");
        }

        return $this->taskRepository->findOne($id);
    }
}