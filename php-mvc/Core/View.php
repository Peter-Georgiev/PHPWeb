<?php

namespace Core;


class View implements ViewInterface
{
    const TEMPLATES_FOLDER = 'templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data = null)
    {
        include "self::TEMPLATES_FOLDER . $templateName . self::TEMPLATES_EXTENSION";
    }
}