<?php
declare(strict_types=1);

namespace App\Http;


use App\Service\UserServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if ($userService->isLogged()){
            $this->template->render("user/profile", $userService->getCurrentUser());
        } else {
            $this->template->render("home/index");
        }
    }
}