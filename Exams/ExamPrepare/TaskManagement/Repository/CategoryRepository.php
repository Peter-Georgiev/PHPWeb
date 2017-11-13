<?php

namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function findAll(): \Generator
    {
        $query = "SELECT id, name FROM categories ORDER BY name ASC";

        return $this->db->query($query)
            ->execute()
            ->fetch(CategoryDTO::class);
    }

    public function findOne(int $id): CategoryDTO
    {
        $query = "SELECT id, name FROM categories WHERE id = ?";

        return $this->db->query($query)
            ->execute($id)
            ->fetch(CategoryDTO::class)
            ->current();
    }

    public function findTasksPerGroup(): \Generator
    {
        $query = "
           SELECT
                categories.id,
                name,
                COUNT(tasks.id) AS taskCount
            FROM
                categories
            INNER JOIN
                tasks
            ON
                tasks.category_id = categories.id
            GROUP BY
                categories.id
            ORDER BY
                COUNT(tasks.id) DESC,
                categories.name ASC
        ";

        return $this->db->query($query)
            ->execute()
            ->fetch(CategoryDTO::class);
    }
}