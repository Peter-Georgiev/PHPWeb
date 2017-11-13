<?php

namespace TaskManagement\Http;


class HomeHttpHandler extends HomeHttpAbstract
{

    public function index()
    {

        if (!isset($_SESSION['id'])) {
            $this->render("home/index");
        } else {
            echo "$_SESSION[id])" . $_SESSION['id'];
            $this->render("home/index");
        }
    }
}