<?php

namespace TaskManagement\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class HomeHttpAbstract
{
    /** @var TemplateInterface */
    private $template;

    /** @var DataBinderInterface */
    protected $binder;


    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->binder = $dataBinder;
    }


    public function render(string $templateName, $data = null, array $errors = [])
    {
        $this->template->render($templateName, $data, $errors);
    }

    public function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }
}