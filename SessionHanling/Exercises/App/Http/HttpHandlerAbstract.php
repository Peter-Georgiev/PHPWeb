<?php
declare(strict_types=1);

namespace App\Http;

use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /** @var TemplateInterface */
    protected $template;

    /** @var  DataBinderInterface */
    protected $dataBinder;

    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null)
    {
        return $this->template->render($templateName, $data);
    }

    public function redirect($url)
    {
        $url .= ".php";
        header("Location: $url");
        exit;
    }
}