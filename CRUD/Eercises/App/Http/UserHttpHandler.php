<?php
/**
 * Created by IntelliJ IDEA.
 * User: RoYaL
 * Date: 11/3/2017
 * Time: 8:23 PM
 */

namespace App\Http;


use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function all(UserServiceInterface $userService, array $formGetData = null)
    {
        $per_page = 3;
        if (!empty($formGetData['p'])) {
            $page = filter_var($formGetData['p'], FILTER_SANITIZE_NUMBER_INT);
            if ($page > 0) {

                $start = ($page - 1) * $per_page;
                $this->render("users/all",
                    $userService->viewPage($start, $per_page));

            } else {
                //TODO ERROR PEGES
            }
        } else {
            $this->render("users/all", $userService->viewAll());
        }

        $data = [
            'pages' => ceil($userService->viewAllID()->getCoutID()/ $per_page)
        ];
        $this->render("users/paging", $data);
    }


    public function profile(UserServiceInterface $userService,
                            array $formData = [], array $formGetData = null)
    {
        $currentUser = $userService->getCurrentUser();
        if (null === $currentUser) {
            $this->redirect("login.php");
        }

        if (isset($formData['edit'])) {
            $this->handleEditProfile($userService, $formData);
        } else {
            $this->render("users/profile", $currentUser);
        }
    }

    public function login(UserServiceInterface $userService,
                          array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            $this->render("users/login");
        }
    }

    public function register(UserServiceInterface $userService,
                             array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    private function handleRegisterProcess(UserServiceInterface $userService,
                                           array $formData): void
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        if ($userService->register(
            $user,
            $formData['confirm_password']
        )) {

            $this->redirect("login.php");
        } else {
            $this->render("app/error",
                new ErrorDTO("Cannot register, maybe username is already 
                taken or password mismatch"));
        }

    }

    private function handleLoginProcess(UserServiceInterface $userService,
                                        array $formData = [])
    {
        $loggedUser = $userService->login($formData['username'], $formData['password']);
        if (null !== $loggedUser) {
            $_SESSION['id'] = $loggedUser->getId();
            $this->redirect("profile.php");
        } else {
            $this->render("app/error",
                new ErrorDTO("Username does not exist or
                 password mismatch."));
        }
    }

    private function handleEditProfile(UserServiceInterface $userService,
                                       array $formData = [])
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        if ($userService->editProfile($user)) {
            $this->redirect("profile.php");
        } else {
            $this->render("app/error",
                new ErrorDTO("Error editing the profile."));
        }
    }

    public function index(UserServiceInterface $userService,
                          array $formData = [])
    {
        $currentUser = $userService->getCurrentUser();
        if (null === $currentUser) {
            $this->render("home/index");
        } else {
            $this->render("users/profile", $currentUser);
        }
    }
}