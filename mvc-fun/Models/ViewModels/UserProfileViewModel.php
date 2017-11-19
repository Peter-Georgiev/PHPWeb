<?php

namespace Models\ViewModels;


class UserProfileViewModel
{
    private $fullName;

    public function __construct($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
}