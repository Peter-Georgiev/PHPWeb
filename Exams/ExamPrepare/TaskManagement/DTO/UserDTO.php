<?php

namespace TaskManagement\DTO;


class UserDTO
{
    const FIELDS_MAX_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 4;
    const PASSWORD_MIN_LENGTH = 6;
    const FIRST_NAME_MIN_LENGTH = 3;
    const LAST_NAME_MIN_LENGTH = 3;


    private $id;

    private $username;

    private $password;

    private $firstName;

    private $lastName;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @throws \Exception
     */
    public function setUsername($username)
    {
        DTOValidator::validate(
            self::USERNAME_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $username,
            "Username length out of range"
        );
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @throws \Exception
     */
    public function setPassword($password)
    {
        DTOValidator::validate(
            self::PASSWORD_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $password,
            "Password length out of range"
        );
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @throws \Exception
     */
    public function setFirstName($firstName)
    {
        DTOValidator::validate(
            self::FIRST_NAME_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $firstName,
            "First name length out of range"
        );
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @throws \Exception
     */
    public function setLastName($lastName)
    {
        DTOValidator::validate(
            self::LAST_NAME_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $lastName,
            "Last name length out of range"
        );

        $this->lastName = $lastName;
    }


}