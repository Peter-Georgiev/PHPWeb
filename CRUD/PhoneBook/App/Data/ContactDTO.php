<?php

namespace App\Data;


class ContactDTO
{
    private $id;
    private $phoneNumber;
    private $firstNumber;
    private $lastNumber;

    public function create(int $id, string $phoneNumber, string $firstNumber, string $lastNumber)
    {
        return (new ContactDTO())
            ->setId($id)
            ->setPhoneNumber($phoneNumber)
            ->setFirstNumber($firstNumber)
            ->setLastNumber($lastNumber);
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @param mixed $firstNumber
     */
    public function setFirstNumber($firstNumber)
    {
        $this->firstNumber = $firstNumber;
        return $this;
    }

    /**
     * @param mixed $lastNumber
     */
    public function setLastNumber($lastNumber)
    {
        $this->lastNumber = $lastNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getFirstNumber()
    {
        return $this->firstNumber;
    }

    /**
     * @return mixed
     */
    public function getLastNumber()
    {
        return $this->lastNumber;
    }
}