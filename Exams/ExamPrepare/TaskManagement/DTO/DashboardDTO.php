<?php

namespace TaskManagement\DTO;

class DashboardDTO
{
    /**
     * @var \Generator|TaskDTO[]
     */
    private $tasks;

    /**
     * @var integer
     */
    private $currentPage;

    /**
     * @var integer
     */
    private $allPages;

    /**
     * @var boolean
     */
    private $hasPrevious;

    /**
     * @var boolean
     */
    private $hasNext;

    /**
     * @return \Generator|TaskDTO[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param \Generator|TaskDTO[] $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage(int $currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return int
     */
    public function getAllPages(): int
    {
        return $this->allPages;
    }

    /**
     * @param int $allPages
     */
    public function setAllPages(int $allPages)
    {
        $this->allPages = $allPages;
    }

    /**
     * @return bool
     */
    public function hasPrevious(): bool
    {
        return $this->hasPrevious;
    }

    /**
     * @param bool $hasPrevious
     */
    public function setPrevious(bool $hasPrevious)
    {
        $this->hasPrevious = $hasPrevious;
    }

    /**
     * @return bool
     */
    public function hasNext(): bool
    {
        return $this->hasNext;
    }

    /**
     * @param bool $hasNext
     */
    public function setNext(bool $hasNext)
    {
        $this->hasNext = $hasNext;
    }




}