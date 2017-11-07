<?php

namespace App\Service;


use App\Data\CountIdDTO;
use App\Data\UserDTO;

interface UserServiceInterface
{

    public function register(UserDTO $userDTO, $confirmPassword): bool;

    public function login(string $username, string $password): ?UserDTO;

    public function getCurrentUser(): ?UserDTO;

    public function editProfile(UserDTO $user): bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function viewAll(): \Generator;

    /**
     * @param int $start
     * @param int|null $pur_page
     * @return \Generator|UserDTO[]
     */
    public function viewPage(int $start = 0, int $pur_page = null): \Generator;

    /**
     * @return CountIdDTO
     */
    public function viewAllID(): CountIdDTO;
}