<?php
declare(strict_types=1);

class Human
{
    private $firstName;
    protected $lastName;

    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            exit("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4) {
            exit("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            exit("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3) {
            exit("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    protected function getFirstName()
    {
        return $this->firstName;
    }

    protected function getLastName()
    {
        return $this->lastName;
    }
}
