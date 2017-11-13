<?php

namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use TaskManagement\DTO\UserDTO;

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


    public function findOneByUsername(string $username): ?UserDTO
    {
        $query = "
            SELECT 
                id, 
                username, 
                password, 
                first_name AS firstName, 
                last_name AS lastName
            FROM
                users
            WHERE
                username = ?
             ";

        return $this->db->query($query)
            ->execute($username)
            ->fetch(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $query = "
            INSERT INTO
              users
            (
              username,
              password,
              first_name,
              last_name
            )
              VALUES
            (
              ?,
              ?,
              ?,
              ?
            );
        ";

        $this->db->query($query)
            ->execute(
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName()
            );

        return true;
    }

    public function findOne(int $id): UserDTO
    {
        $query = "
            SELECT 
                id, 
                username, 
                password, 
                first_name AS firstName, 
                last_name AS lastName
            FROM
                users
            WHERE
                id = ?
             ";

        return $this->db->query($query)
            ->execute($id)
            ->fetch(UserDTO::class)
            ->current();
    }
}