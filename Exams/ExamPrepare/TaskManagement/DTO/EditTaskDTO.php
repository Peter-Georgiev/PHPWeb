<?php

namespace TaskManagement\DTO;

class EditTaskDTO
{
    /**
     * @var TaskDTO
     */
    private $task;

    /**
     * @var CategoryDTO[]
     */
    private $categories;

    /**
     * @return TaskDTO
     */
    public function getTask(): TaskDTO
    {
        return $this->task;
    }

    /**
     * @param TaskDTO $task
     */
    public function setTask(TaskDTO $task)
    {
        $this->task = $task;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories()
    {
        return $this->categories;
    }


    public function setCategories($categories)
    {
        $this->categories = $categories;
    }



}