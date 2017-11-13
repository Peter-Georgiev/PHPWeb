<?php

namespace TaskManagement\Http;


use TaskManagement\Service\TaskServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            $this->render("home/index");
        } else {
            $this->redirect("dashboard.php");
        }
    }

    public function dashboard(TaskServiceInterface $taskService,
                              array $getData = [])
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect("index.php");
        }

        $page = 1;
        if (isset($getData['page'])) {
            $page = intval($getData['page']);
        }
        $dashboardDTO = $taskService->getDashboard($page);

        $this->render("tasks/all", $dashboardDTO);
    }
}