<?php

namespace App\Http;


use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var  TemplateInterface
     * */
    protected $template;

    //който и да е клас който отговаря на class TemplateInterface
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    // абстракция - рендериране
    protected function render(string $templateName, $data = null)
    {
        $this->template->render($templateName, $data);
    }

    //помощна функция
    public function redirect(string $url)
    {
        $url .= '.php';
        header('Location' . $url);
        exit;
    }
}