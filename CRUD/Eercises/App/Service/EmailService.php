<?php

namespace App\Service;

use App\Data\EmailDTO;
use App\Repository\EmailRepositoryInterface;

class EmailService implements EmailServiceInterface
{
    /** @var  EmailRepositoryInterface */
    private $emailRepository;

    /**
     * EmailService constructor.
     * @param EmailRepositoryInterface $emailRepository
     */
    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function register($id, EmailDTO $email): bool
    {
        if (!isset($_SESSION['id'])) {
            return false;
        }

        return $this->emailRepository->insert(intval($_SESSION['id']), $email);
    }

    public function deleteOneEmail(int $id): bool
    {
        return $this->emailRepository->delete($id);
    }

    /** @return \Generator|EmailDTO[] */
    public function allMail(): \Generator
    {
        return $this->emailRepository->findAll();
    }
}