<?php

namespace App\Core\Peer\Exceptions;

class ArrayNotEqualNException extends \Exception
{
    public function __construct($message = "Values not equal N", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
