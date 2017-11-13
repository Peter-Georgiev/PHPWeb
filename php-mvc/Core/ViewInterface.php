<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 13.11.2017
 * Time: 17:09 ч.
 */

namespace Core;


interface ViewInterface
{
    public function render(string $viewName, $model = null);
}