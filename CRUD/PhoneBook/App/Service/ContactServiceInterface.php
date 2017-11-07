<?php

namespace App\Service;


use App\Data\ContactDTO;

interface ContactServiceInterface
{
    public function register(ContactDTO $contact): bool ;
}