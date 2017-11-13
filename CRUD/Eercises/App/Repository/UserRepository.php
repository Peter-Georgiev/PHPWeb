<?php

namespace App\Repository;


use App\Data\CountIdDTO;
use App\Data\UserDTO;
use Database\DatabaseInterface;

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

// Repository layer
    public function insert(UserDTO $user): bool
    {
        $this->db->query("
            INSERT INTO users 
              (username, password, first_name, last_name, born_on)
            VALUE 
              (?, ?, ?, ?, ?)
      ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBornOn()
        ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
            SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
            FROM users
            WHERE username = ?
      ")->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
            FROM users
            WHERE id = ?
      ")->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update($id, UserDTO $user): bool
    {
        $this->db->query("
            UPDATE users 
            SET
              username = ?,
              password = ?,
              first_name = ?,
              last_name = ?,
              born_on = ?
            WHERE
              id = ?
      ")->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getBornOn(),
            $id
        ]);

        return true;
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(int $start = 0, int $pur_page = null): \Generator
    {
        return $this->db->query("
                SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
                FROM users")
            ->execute()
            ->fetch(UserDTO::class);
    }

    /**
     * @param int $start
     * @param int|null $pur_page
     * @return \Generator|UserDTO[]
     */
    public function findAllPage(int $start = 0, int $pur_page = null): \Generator
    {
        return $this->db->query("
                SELECT id, username, password, first_name AS firstName, last_name AS lastName, born_on AS bornOn
                FROM users
                LIMIT " . $start . ", " . $pur_page . "
        ")->execute()
            ->fetch(UserDTO::class);
    }

    public function countAll(): CountIdDTO
    {
        return $this->db->query("
                SELECT COUNT(id) AS countID
                FROM users
        ")->execute()
            ->fetch(CountIdDTO::class)
            ->current();
    }
}