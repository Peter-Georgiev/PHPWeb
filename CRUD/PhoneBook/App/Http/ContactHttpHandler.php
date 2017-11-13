<?php

namespace App\Http;


use App\Data\ContactDTO;
use App\Service\ContactServiceInterface;

class ContactHttpHandler extends HttpHandlerAbstract
{
    public function listAll()
    {

    }

    public function register(ContactServiceInterface $contactService, array $contactData = [])
    {
        if (isset($contactData['register'])) {
            //!!!!!!!!!!!!!????????????????!!!!!!!!!!!!!!
            $contact = ContactDTO::create(
                $contactData['phoneNumber'],
                $contactData['firstName'],
                $contactData['lastName']
            );
            var_dump($contact);
            $contactService->register($contact);
            $this->redirect('phones');
        } else {
            $this->render('user/register');
        }

    }
}