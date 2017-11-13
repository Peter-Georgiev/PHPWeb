<?php

namespace App\Repository;


use App\Data\UserEmailDTO;
use Database\DatabaseInterface;

class UserEmailRepository implements UserEmailRepositoryInterface
{
    /** @var  DatabaseInterface */
    private $db;

    /**
     * UserEmailRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /** @return \Generator|UserEmailDTO[] */
    public function findAll(): \Generator
    {
        return $this->db->query("
                SELECT u.id AS id, u.username, u.first_name AS firstName,
                u.last_name AS lastName, u.born_on AS bornOn, e.id AS emailId,
                e.user_id AS userId, e.email
                FROM users AS u
                INNER JOIN emails AS e
                ON u.id = e.user_id
                ORDER BY u.id")
            ->execute()
            ->fetchAll(UserEmailDTO::class);
    }

    /** @return \Generator|UserEmailDTO[] */
    public function findByOne(int $id): \Generator
    {
        return $this->db->query("
                SELECT u.id AS id, u.username, u.first_name AS firstName,
                u.last_name AS lastName, u.born_on AS bornOn, e.id AS emailId,
                e.user_id AS userId, e.email
                FROM users AS u
                INNER JOIN emails AS e
                ON u.id = e.user_id
                WHERE u.id = ?
                ORDER BY u.id")
            ->execute([$id])
            ->fetchAll(UserEmailDTO::class);
    }

}