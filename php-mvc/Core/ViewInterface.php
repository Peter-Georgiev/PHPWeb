<?php

namespace Core;


interface ViewInterface
{
    public function render(string $viewName, $data = null);
}