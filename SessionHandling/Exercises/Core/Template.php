<?php
declare(strict_types=1);

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATES_FOLDER = 'App/Templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data = null)
    {
        require_once self::TEMPLATES_FOLDER
            . $templateName . self::TEMPLATES_EXTENSION;
    }
}