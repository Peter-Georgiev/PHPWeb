<?php

namespace TaskManagement\DTO;


class CategoryDTO
{
    const NAME_MIN_LENGTH = 3;
    const NAME_MAX_LENGTH = 50;

    private $id;

    private $name;

    private $taskCount;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        DTOValidator::validate(
            self::NAME_MIN_LENGTH,
            PHP_INT_MAX,
            $name,
            "Name length of range"
        );

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTaskCount()
    {
        return $this->taskCount;
    }

    /**
     * @param mixed $taskCount
     */
    public function setTaskCount($taskCount)
    {
        $this->taskCount = $taskCount;
    }



}