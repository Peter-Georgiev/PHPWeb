<?php
<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> origin/master

namespace Core;


class Template implements TemplateInterface
{
<<<<<<< HEAD
    const TEMPLATES_FOLDER = 'App/Templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data = null)
    {
        require_once self::TEMPLATES_FOLDER
            . $templateName . self::TEMPLATES_EXTENSION;
=======
    const TEMPLATES_FOLDER = 'App/Template/';
    const  TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $dataObj = null)
    {
        require_once self::TEMPLATES_FOLDER .
            $templateName . self::TEMPLATES_EXTENSION;
>>>>>>> origin/master
    }
}