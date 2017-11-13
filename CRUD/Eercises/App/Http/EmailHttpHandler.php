<?php

namespace App\Http;


use App\Data\EmailDTO;
use App\Service\EmailServiceInterface;

class EmailHttpHandler extends HttpHandlerAbstract
{


    public function newMail(EmailServiceInterface $emailService, array $formData = [])
    {
        $email = $this->dataBinder->bind($formData, EmailDTO::class);
        if (isset($_SESSION['id'])) {
            $this->render("email/new");
            if (isset($formData['addEmail'])) {
                $this->render("email/new",
                    $emailService->register(intval($_SESSION['id']), $email));
            }
        } else {
            $this->render("users/login");
        }
    }

    public function allMail(EmailServiceInterface $emailService, array $formData = [])
    {
        $this->render("email/all", $emailService->allMail());
    }

    public function removeMail(EmailServiceInterface $emailService, array $formData = [])
    {
        var_dump($formData);
        if (isset($formData['removeMail'])) {
            var_dump($emailService);

        }
    }
}