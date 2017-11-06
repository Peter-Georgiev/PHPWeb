<?php
declare(strict_types=1);

namespace App\Data;


class ErrorDTO
{
    private $errorInfo;

    /**
     * ErrorDTO constructor.
     * @param $errorInfo
     */
    public function __construct($errorInfo)
    {
        $this->errorInfo = $errorInfo;
    }


    /**
     * @return mixed
     */
    public function getErrorInfo()
    {
        return $this->errorInfo;
    }
}