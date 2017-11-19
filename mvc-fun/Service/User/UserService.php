<?php

namespace Service\User;


use Models\BindingModels\UserRegisterBindingModel;
use Repository\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterBindingModel $user): bool
    {
        if ($user->getPassword() !== $user->getConfirmPassword()) {
            throw new \Exception("Passwords mismatch!");
        }

        $userFromDb = $this->userRepository->findOneByUsername($user->getUsername());

        if (null !== $userFromDb) {
            throw new \Exception("User already exists!");
        }

        $plainPassword = $user->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $user->setPassword($passwordHash);

        return $this->userRepository->insert($user);
    }
}