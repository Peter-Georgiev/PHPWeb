<?php

namespace App\Repository;


use App\Data\ContactDTO;

interface ContactRepositoryInterface
{
    //CRUD

    public function insert(ContactDTO $contact);

    public function read();

    public function update(ContactDTO $contact);

    public function delete(int $id);

}