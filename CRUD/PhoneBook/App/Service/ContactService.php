<?php

namespace App\Service;


use App\Data\ContactDTO;
use App\Repository\ContactRepositoryInterface;

class ContactService implements ContactServiceInterface
{
    /** @var  ContactRepositoryInterface */
    private $contactRepository;

    /**
     * ContactService constructor.
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function register(ContactDTO $contact): bool
    {
        var_dump($contact->getPhoneNumber());
        var_dump( $this->contactRepository->findByOnePhoneNumber($contact->getPhoneNumber()));

        if ($this->contactRepository->insert($contact) > 0) {
            return true;
        }

        return false;
    }
}