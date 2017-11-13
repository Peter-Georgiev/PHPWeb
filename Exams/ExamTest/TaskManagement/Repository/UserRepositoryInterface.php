<?php
namespace TaskManagement\Repository;

use TaskManagement\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user): bool;

    public function findOneById(int $id): UserDTO;

    public function findOneByUsername(string $username): ?UserDTO;
}