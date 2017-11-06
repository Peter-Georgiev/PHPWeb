<?php
declare(strict_types=1);

namespace App\Repository;

use App\Data\UserDTO;

interface UserRepossitoryInterface
{
    public function findOne(int $id): ?UserDTO;

    public function findOneByUsername(string $username): ?UserDTO;

    /** @return \Generator|UserDTO[] */
    public function findAll(): \Generator;

    public function insert(UserDTO $user): bool;

    public function update(int $id, UserDTO $user): bool;

    public function delete(UserDTO $user): bool;
}