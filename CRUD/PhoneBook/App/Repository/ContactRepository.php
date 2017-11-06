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

    public function insert(ContactDTO $contact): ContactDTO
    {
        return $this->db->query("
            INSERT INTO contacts
                (phone_number, first_name, last_name)
            VALUES (?, ?, ?)")
            ->execute([
                $contact->getPhoneNumber(),
                $contact->getFirstNumber(),
                $contact->setLastNumber()
            ]);

        return $this->db->getLastId();
    }

    public function read()
    {
        return $this->db->query("
            SELECT 
              id, 
              phone_number AS phoneNumber,
              first_name AS firstName,
              last_name AS lastName
             FROM phone_book.")
                ->execute()
                ->fetchAll(ContactDTO::class);
    }

    public function update(ContactDTO $contact)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}