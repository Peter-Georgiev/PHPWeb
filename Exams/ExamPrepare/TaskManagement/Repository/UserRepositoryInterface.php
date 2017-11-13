<?php

namespace TaskManagement\Repository;


use TaskManagement\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function findOne(int $id): UserDTO;

    public function findOneByUsername(string $username): ?UserDTO;

    public function insert(UserDTO $user): bool;
}