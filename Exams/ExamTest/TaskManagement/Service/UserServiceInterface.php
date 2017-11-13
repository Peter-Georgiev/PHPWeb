<?php

namespace TaskManagement\Service;

use TaskManagement\DTO\UserDTO;

interface UserServiceInterface
{
    public function login(string $username, string $password): bool;

    public function register(UserDTO $user, string $confirmPassword): bool;

    public function getCurrentUser(): UserDTO;
}