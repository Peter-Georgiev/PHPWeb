<?php

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATES_FOLDER = 'App/Template/';
    const  TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $dataObj = null)
    {
        require_once self::TEMPLATES_FOLDER .
            $templateName . self::TEMPLATES_EXTENSION;
    }
}