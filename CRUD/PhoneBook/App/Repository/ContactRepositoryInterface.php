<?php

namespace App\Repository;


use App\Data\ContactDTO;

interface ContactRepositoryInterface
{
    //CRUD

    public function insert(ContactDTO $contact): int ;

    public function read(): ContactDTO;

    public function update(ContactDTO $contact): bool ;

    public function delete(int $id, ContactDTO $contact): bool ;

    public function findByOnePhoneNumber(string $phoneNumber): ContactDTO;

}