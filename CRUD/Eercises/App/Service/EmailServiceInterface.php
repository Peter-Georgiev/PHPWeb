<?php

namespace App\Service;


use App\Data\EmailDTO;

interface EmailServiceInterface
{
    public function register($id, EmailDTO $email): bool ;

    public function deleteOneEmail(int $id): bool;

    public function allMail(): \Generator;
}