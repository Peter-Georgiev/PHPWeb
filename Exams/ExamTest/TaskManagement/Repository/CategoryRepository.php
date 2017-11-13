<?php

namespace TaskManagement\Repository;


use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;

class CategoryRepository implements CategoryRepositoryInterface
{
    /** @var  DatabaseInterface */
    private $db;

    /**
     * CategoryRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /** @return \Generator|CategoryDTO[] */
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
}