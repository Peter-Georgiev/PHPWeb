<?php
declare(strict_types=1);

namespace Core;


interface TemplateInterface
{
    public function render(string $templateName, $data = null);
}