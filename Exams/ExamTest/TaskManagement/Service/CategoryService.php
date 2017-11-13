<?php

namespace TaskManagement\Service;


use TaskManagement\DTO\CategoryDTO;
use TaskManagement\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /** @var  CategoryRepositoryInterface */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /** @return \Generator|CategoryDTO[] */
    public function getAll(): \Generator
    {
       return $this->categoryRepository->findAll();
    }

    public function viewPerId(int $id): CategoryDTO
    {
        return $this->categoryRepository->findOne($id);
    }

}