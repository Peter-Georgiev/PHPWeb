<?php

namespace Repository\User;


use Database\DatabaseInterface;
use Models\BindingModels\UserRegisterBindingModel;
use Models\Entity\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserRegisterBindingModel $user): bool
    {
        $query = "
            INSERT INTO users(username, `password`, groups_id)
            VALUES(?, ?, 
            (SELECT ug.groups_id FROM users_groups AS ug WHERE ug.name = 'user'))";

        $this->db->query($query)
            ->execute(
                $user->getUsername(),
                $user->getPassword()
            );

        return true;
    }

    public function findOneByUsername(string $username): ?User
    {
        $query = "
            SELECT id, username, `password`
            FROM users
            WHERE username = ?";

        return $this->db->query($query)
            ->execute($username)
            ->fetch(User::class)
            ->current();
    }

}