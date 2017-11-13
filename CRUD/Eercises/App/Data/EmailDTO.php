<?php

namespace App\Data;


class EmailDTO
{
    private $id;
    private $userId;
    private $email;

    public static function create(int $userId, string $email, int $id = null): EmailDTO
    {
        return (new EmailDTO())
            ->setUserId($userId)
            ->setEmail($email)
            ->setId($id);
    }

    public function setId($id): EmailDTO
    {
        $this->id = $id;

        return $this;
    }

    public function setUserId($userId): EmailDTO
    {
        $this->userId = $userId;

        return $this;
    }

    public function setEmail($email): EmailDTO
    {
        $this->email = $email;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getEmail()
    {
        return $this->email;
    }
}