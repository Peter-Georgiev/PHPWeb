<?php
declare(strict_types=1);

namespace Core;


interface DataBinderInterface
{
    public function bind(array $from, $className);
}