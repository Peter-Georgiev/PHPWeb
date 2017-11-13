<?php

namespace App\Repository;


use App\Data\EmailDTO;
use Database\DatabaseInterface;

class EmailRepository implements EmailRepositoryInterface
{
    /** @var  DatabaseInterface */
    private $db;

    /**
     * EmailRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert($id, EmailDTO $email): bool
    {
        $this->db->query("
        INSERT INTO emails(user_id, email)
        VALUES (?,?)")
            ->execute([
               $id,
               $email->getEmail()
            ]);
        return true;
    }

    public function delete($id): bool
    {
        $this->db->query("
                  DELETE FROM emails
                  WHERE id = ?")
            ->execute([$id]);

        return true;
    }

    /** @return \Generator|EmailDTO[] */
    public function findAll(): \Generator
    {
        return $this->db->query("
                SELECT id, user_id AS userId, email
                FROM emails")
                    ->execute()
                    ->fetch(EmailDTO::class);
    }
}