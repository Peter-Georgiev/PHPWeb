<?php
declare(strict_types=1);

namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepossitoryInterface
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
       return $this->db->query("
                SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn 
                FROM users
                WHERE username = ?")
            ->execute([$username])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query("
                SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn 
                FROM users
                WHERE id = ?")
            ->execute([$id])
            ->fetchAll(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $this->db->query("
              INSERT INTO users
                (username, password, first_name, last_name, born_on) 
              VALUES (?, ?, ?, ?, ?)")
            ->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getBornOn()
            ]);

        return true;
    }

    public function update(int $id, UserDTO $user): bool
    {
        $this->db->query("
                UPDATE users 
                SET username = ?, password = ?, first_name = ?, last_name = ?, born_on = ?
                WHERE id = ?")
            ->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getBornOn(),
                $id
            ]);

        return true;
    }

    public function delete(UserDTO $user): bool
    {
        // TODO: Implement delete() method.
    }

    /** @return \Generator|UserDTO[] */
    public function findAll(): \Generator
    {
        return $this->db->query("
                        SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
                        FROM users")
                    ->execute()
                    ->fetchAll(UserDTO::class);
    }
}