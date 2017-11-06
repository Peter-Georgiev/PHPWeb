<?php
declare(strict_types=1);

namespace App\Service;

use App\Data\UserDTO;
use App\Repository\UserRepossitoryInterface;

class UserService implements UserServiceInterface
{
    /** @var  UserRepossitoryInterface */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepossitoryInterface $userRepository
     */
    public function __construct(UserRepossitoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $user, $confirmPassword): bool
    {
        //Business operation
        if ($user->getPassword() != $confirmPassword) {
            return false;
        }

        if (null != $this->userRepository->findOneByUsername($user->getUsername())) {
            return false;
        }
        $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
        return $this->userRepository->insert($user);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $user = $this->userRepository->findOneByUsername($username);

        if (null === $user) {
            return null;
        }

        $passwordHash = $user->getPassword();

        if (true === password_verify($password, $passwordHash)) {
            return $user;
        }

        return null;
    }

    public function editProfile(UserDTO $user): bool
    {
        $existingUser = $this->userRepository->findOneByUsername($user->getUsername());
        if (null !== $existingUser) {
            return false;
        }

        $plainPassword = $user->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $user->setPassword($passwordHash);

        return $this->userRepository->update(intval($_SESSION['id']), $user);
    }

    /** @return \Generator|UserDTO[] */
    public function viewAll(): \Generator
    {
        return $this->userRepository->findAll();
    }

    public function isLogged(): bool
    {
        // TODO: Implement isLogged() method.
    }

    public function getCurrentUser():?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        return $this->userRepository->findOne(intval($_SESSION['id']));
    }
}