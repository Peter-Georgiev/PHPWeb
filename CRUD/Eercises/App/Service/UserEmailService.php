<?php

namespace App\Service;


use App\Data\UserEmailDTO;
use App\Repository\UserEmailRepositoryInterface;

class UserEmailService implements UserEmailServiceInterface
{
    /** @var  UserEmailRepositoryInterface */
    private $userEmailRepository;

    /**
     * UserEmailService constructor.
     * @param UserEmailRepositoryInterface $userEmailRepository
     */
    public function __construct(UserEmailRepositoryInterface $userEmailRepository)
    {
        $this->userEmailRepository = $userEmailRepository;
    }

    /** @return \Generator|UserEmailDTO[] */
    public function findAllUserEmail(): \Generator
    {
        return $this->userEmailRepository->findAll();
    }

    /** @return \Generator|UserEmailDTO[] */
    public function findOneEmail(int $id): \Generator
    {
        return $this->userEmailRepository->findByOne($id);
    }
}