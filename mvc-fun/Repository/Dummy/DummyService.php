<?php

namespace Repository\Dummy;


use Repository\User\UserRepositoryInterface;
use Service\User\UserServiceInterface;

class DummyService implements DummyServiceInterface
{
    /** @var  UserRepositoryInterface */
    private $userRepository;
    /** @var  UserServiceInterface */
    private $userService;

    /**
     * DummyService constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserServiceInterface $userService
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                UserServiceInterface $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function printSmth()
    {
        // TODO: Implement printSmth() method.
        echo 'Dummy service here';
        var_dump($this->userService);
        var_dump($this->userRepository);
    }
}