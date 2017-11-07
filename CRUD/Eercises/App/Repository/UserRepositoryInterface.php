<?php

namespace App\Repository;


use App\Data\CountIdDTO;
use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user): bool;

    public function findOneByUsername(string $username): ?UserDTO;

    public function findOne(int $id): ?UserDTO;

    public function update($id, UserDTO $user): bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator;

    /**
     * @param int $start
     * @param int|null $pur_page
     * @return \Generator|UserDTO[]
     */
    public function findAllPage(int $start = 0, int $pur_page = null): \Generator;

    /**
     * @return CountIdDTO
     */
    public function countAll(): CountIdDTO;
}