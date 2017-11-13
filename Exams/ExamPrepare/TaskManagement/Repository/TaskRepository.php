<?php

namespace TaskManagement\Repository;


use Core\DataBinderInterface;
use Database\DatabaseInterface;
use TaskManagement\DTO\CategoryDTO;
use TaskManagement\DTO\TaskDTO;
use TaskManagement\DTO\UserDTO;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db,
                                DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    public function count(): int
    {
        $query = "
            SELECT COUNT(id) AS taskCount
            FROM tasks;
        ";
        return intval($this->db->query($query)
            ->execute()
            ->fetchColumn());
    }

    public function findAll(int $limit = 0, int $offset = 0): \Generator
    {
        $limitClause = "";
        if ($limit > 0) {
            $limitClause = "LIMIT " . $limit . " OFFSET $offset";
        }

        $query = "
            SELECT
                tasks.id AS task_id,
                title,
                description,
                location,
                users.id AS author_id,
                users.username AS username,
                users.password AS password,
                users.first_name AS firstName,
                users.last_name AS lastName,
                categories.id AS category_id,
                categories.name AS name,
                started_on,
                due_date
            FROM
                tasks
            INNER JOIN
                categories 
            ON tasks.category_id = categories.id
            INNER JOIN
              users
            ON tasks.author_id = users.id
            ORDER BY
                due_date DESC,
                tasks.id ASC
            $limitClause ;
        ";

        $lazyTasksResult = $this->db->query($query)
            ->execute()
            ->fetch();

        foreach ($lazyTasksResult as $row) {
            /**
             * @var TaskDTO $task
             * @var UserDTO $author;
             * @var CategoryDTO $category
             */
            $task = $this->dataBinder->bind($row, TaskDTO::class);
            $task->setId($row['task_id']);

            $author = $this->dataBinder->bind($row, UserDTO::class);
            $author->setId($row['author_id']);

            $category = $this->dataBinder->bind($row, CategoryDTO::class);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $query = "
           SELECT
                tasks.id AS task_id,
                title,
                description,
                location,
                users.id AS author_id,
                users.username AS username,
                users.password AS password,
                users.first_name AS firstName,
                users.last_name AS lastName,
                categories.id AS category_id,
                categories.name AS name,
                started_on,
                due_date
            FROM
                tasks
            INNER JOIN
                categories 
            ON tasks.category_id = categories.id
            INNER JOIN
              users
            ON tasks.author_id = users.id
            WHERE
                tasks.id = ?
            ";

        $row = $this->db->query($query)
            ->execute($id)
            ->fetch()
            ->current();

        /**
         * @var TaskDTO $task
         * @var UserDTO $author;
         * @var CategoryDTO $category
         */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        $task->setId($row['task_id']);

        $author = $this->dataBinder->bind($row, UserDTO::class);
        $author->setId($row['author_id']);

        $category = $this->dataBinder->bind($row, CategoryDTO::class);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }

    public function insert(TaskDTO $task): bool
    {
        $query = "
            INSERT INTO
              tasks
            SET
              title = ?,
              description = ?,
              location = ?,
              author_id = ?,
              category_id = ?,
              started_on = ?,
              due_date = ? 
        ";

        $this->db->query($query)
            ->execute(
                $task->getTitle(),
                $task->getDescription(),
                $task->getLocation(),
                $task->getAuthor()->getId(),
                $task->getCategory()->getId(),
                $task->getStartedOn(),
                $task->getDueDate()
            );

        return true;
    }

    public function update(TaskDTO $task, int $id): bool
    {
        $query = "
            UPDATE
              tasks
            SET
              title = ?,
              description = ?,
              location = ?,
              author_id = ?,
              category_id = ?,
              started_on = ?,
              due_date = ? 
            WHERE
              id = ?
        ";

        $this->db->query($query)
            ->execute(
                $task->getTitle(),
                $task->getDescription(),
                $task->getLocation(),
                $task->getAuthor()->getId(),
                $task->getCategory()->getId(),
                $task->getStartedOn(),
                $task->getDueDate(),
                $id
            );

        return true;
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM tasks WHERE id = ?";
        $this->db->query($query)->execute($id);

        return true;
    }
}