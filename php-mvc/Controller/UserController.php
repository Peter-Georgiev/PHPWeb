<?php

namespace Controller;


use Core\View;
use Model\UserRegisterViewModel;

class UserController
{
    /** @var  View */
    private $view;

    /**
     * UserController constructor.
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }


    public function register(string $name)
    {
        $user = new UserRegisterViewModel();
        $user->setId(45);
        $user->setName($name);

        $this->view->render('user_register', $user);
    }

    public function delete()
    {
        $this->view->render('user_delete');
    }
}