<?php

namespace Controllers;

use Models\BindingModels\UserRegisterBindingModel;
use Models\ViewModels\UserProfileViewModel;
use Repository\Dummy\DummyServiceInterface;
use Service\User\UserServiceInterface;

class UsersController extends AbstractController
{

    public function profile(string $firstName, string $lastName)
    {
        $fullName = $firstName . ' ' . $lastName;
        $model = new UserProfileViewModel($fullName);

        $this->render('users/profile', $model);
    }

    public function register()
    {
        $this->render();
    }

    public function registerProcess(UserRegisterBindingModel $bindingModel,
                                    DummyServiceInterface $dummyService,
                                    UserServiceInterface $userService)
    {
        $userService->register($bindingModel);
        $dummyService->printSmth();
        $this->redirect('home', 'index', $bindingModel->getUsername());
    }
}