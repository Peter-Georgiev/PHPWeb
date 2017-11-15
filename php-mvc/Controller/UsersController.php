<?php

namespace Controller;


use Core\ViewInterface;
use DTO\UserViewModel;
use Model\UserRegisterViewModel;

class UsersController implements ControllerInterface
{
    /** @var  ViewInterface */
    private $view;

    /**
     * UsersController constructor.
     * @param ViewInterface $view
     */
    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function register(string $name, int $id = 0)
    {
        $user = new UserRegisterViewModel();
        $user->setId($id);
        $user->setName($name);

        $this->view->render('user_register', $user);
    }

    public function delete(string $name, int $id)
    {
        $user = new UserRegisterViewModel();
        $user->setId($id);
        $user->setName($name);

        $this->view->render('user_delete', $user);
    }

    public function hello(string $firstName, string $lastName)
    {
        $viewModel = new UserViewModel($firstName, $lastName);

        $this->view->render('users/users_hello', $viewModel);
    }

    public function index()
    {
        include TEMPLATES_FOLDER . '/index.php';
    }
}