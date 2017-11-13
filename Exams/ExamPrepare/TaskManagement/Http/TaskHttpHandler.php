<?php

namespace TaskManagement\Http;


use TaskManagement\DTO\EditTaskDTO;
use TaskManagement\DTO\TaskDTO;
use TaskManagement\Service\CategoryServiceInterface;
use TaskManagement\Service\TaskServiceInterface;
use TaskManagement\Service\UserServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function report(CategoryServiceInterface $categoryService)
    {
        $reportData = $categoryService->report();
        $this->render("home/report", $reportData);
    }

    public function add(TaskServiceInterface $taskService,
                        CategoryServiceInterface $categoryService,
                        UserServiceInterface $userService,
                        array $formData = [])
    {
        if (!isset($formData['save'])) {
            $categories = $categoryService->getAll();
            $this->render("tasks/add", $categories);
        } else {
            $this->handleInsertProcess($taskService, $categoryService, $userService, $formData);
        }
    }

    public function edit(TaskServiceInterface $taskService,
                         CategoryServiceInterface $categoryService,
                         UserServiceInterface $userService,
                         array $formData = [], array $getData = [])
    {
        if (!isset($formData['edit'])) {
            $task = $taskService->view($getData['id']);
            $editDto = new EditTaskDTO();
            $editDto->setTask($task);
            $editDto->setCategories($categoryService->getAll());
            $this->render("tasks/edit", $editDto);
        } else {
            $this->handleEditProcess($taskService, $categoryService, $userService, $formData, $getData);
        }
    }

    public function delete(TaskServiceInterface $taskService, array $getData)
    {
        $taskService->remove($getData['id']);
        $this->redirect("dashboard.php");
    }

    public function handleEditProcess(TaskServiceInterface $taskService,
                                      CategoryServiceInterface $categoryService,
                                      UserServiceInterface $userService,
                                      array $formData = [], array $getData = [])
    {
        $author = $userService->getCurrentUser();
        $category = $categoryService->view($formData['category_id']);
        /** @var TaskDTO $task */
        $task = $this->binder->bind($formData, TaskDTO::class);
        $task->setAuthor($author);
        $task->setCategory($category);

        $taskService->edit($task, $getData['id']);

        $this->redirect("dashboard.php");
    }

    public function handleInsertProcess(TaskServiceInterface $taskService,
                                        CategoryServiceInterface $categoryService,
                                        UserServiceInterface $userService,
                                        array $formData = [])
    {
        $author = $userService->getCurrentUser();
        $category = $categoryService->view($formData['category_id']);
        /** @var TaskDTO $task */
        $task = $this->binder->bind($formData, TaskDTO::class);
        $task->setAuthor($author);
        $task->setCategory($category);

        $taskService->add($task);

        $this->redirect("dashboard.php");
    }
}