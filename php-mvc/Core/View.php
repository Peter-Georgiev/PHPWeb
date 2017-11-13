<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 13.11.2017
 * Time: 17:05 ч.
 */

namespace Core;


class View implements ViewInterface
{
    const VIEW_FOLDER = 'View';
    const VIEW_EXTENSION = '.php';

    public function render(string $viewName, $model = null)
    {
        include self::VIEW_FOLDER.'/'.$viewName.self::VIEW_EXTENSION;
    }
}