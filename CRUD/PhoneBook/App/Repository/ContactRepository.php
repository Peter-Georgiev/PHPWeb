<?php

namespace App\Repository;


use App\Data\ContactDTO;
use Database\DatabaseInterface;

class ContactRepository implements ContactRepositoryInterface
{

    /** @var  DatabaseInterface */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(ContactDTO $contact): int
    {
        return $this->db->query("
            INSERT INTO contacts(phone_number, first_name, last_name)
            VALUES (?, ?, ?)")
            ->execute([
                $contact->getPhoneNumber(),
                $contact->getFirstNumber(),
                $contact->setLastNumber()
            ]);
        return $this->db->getLastId();
    }

    public function read(): ContactDTO
    {
        return $this->db->query("
            SELECT 
              id, 
              phone_number AS phoneNumber,
              first_name AS firstName,
              last_name AS lastName
             FROM contacts")
                ->execute()
                ->fetchAll(ContactDTO::class);
    }

    public function update(ContactDTO $contact): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id, ContactDTO $contact): bool
    {
        // TODO: Implement delete() method.
    }

    public function findByOnePhoneNumber(string $phoneNumber): ContactDTO
    {
        exit($phoneNumber);
        return $this->db->query("
            SELECT 
              id, 
              phone_number AS phoneNumber,
              first_name AS firstName,
              last_name AS lastName
            FROM contacts
            WHERE phone_number = ?")
            ->execute([$phoneNumber])
            ->fetchAll(ContactDTO::class);
    }
}