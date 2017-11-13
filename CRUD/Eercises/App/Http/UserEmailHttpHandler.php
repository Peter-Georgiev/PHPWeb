<?php

namespace App\Http;


use App\Service\UserEmailServiceInterface;

class UserEmailHttpHandler extends HttpHandlerAbstract
{
    public function allUserPerMail(UserEmailServiceInterface $userEmailService, array $formData = [])
    {
        $this->render("email/all_user_per_mail", $userEmailService->findAllUserEmail());
    }

    public function oneUserPerMail(UserEmailServiceInterface $userEmailService, array $formData = [])
    {
        $userPerMail = $userEmailService->findOneEmail(intval($_SESSION['id']));

        if (null != $userPerMail->valid()) {
            $this->render("email/one_user_per_mail", $userPerMail);
        } else {
            $this->redirect('all_user_per_mail.php');
        }
    }
}