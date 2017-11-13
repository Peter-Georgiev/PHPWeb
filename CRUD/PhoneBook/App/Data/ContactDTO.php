<?php

namespace App\Data;


class ContactDTO
{
    private $id;
    private $phoneNumber;
    private $firstNumber;
    private $lastNumber;

    /**
     * @param string $phoneNumber
     * @param string $firstNumber
     * @param string $lastNumber
     * @param null $id
     * @return ContactDTO
     */
    public static function create(string $phoneNumber, string $firstNumber, string $lastNumber, $id = null): ContactDTO
    {
        return (new ContactDTO())
            ->setId($id)
            ->setPhoneNumber($phoneNumber)
            ->setFirstNumber($firstNumber)
            ->setLastNumber($lastNumber);
    }

    public function setId($id): ContactDTO
    {
        $this->id = $id;
        return $this;
    }

    public function setPhoneNumber($phoneNumber): ContactDTO
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function setFirstNumber($firstNumber): ContactDTO
    {
        $this->firstNumber = $firstNumber;
        return $this;
    }

    public function setLastNumber($lastNumber): ContactDTO
    {
        $this->lastNumber = $lastNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getFirstNumber()
    {
        return $this->firstNumber;
    }

    /**
     * @return string
     */
    public function getLastNumber()
    {
        return $this->lastNumber;
    }
}