<?php
declare(strict_types=1);

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $user, $confirmPassword): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function editProfile(UserDTO $user): bool;

    /** @return \Generator|UserDTO[] */
    public function viewAll(): \Generator;

    public function isLogged(): bool;

    public function getCurrentUser():?UserDTO;
}