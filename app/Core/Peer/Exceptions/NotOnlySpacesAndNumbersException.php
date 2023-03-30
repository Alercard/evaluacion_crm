<?php

namespace App\Core\Peer\Exceptions;

class NotOnlySpacesAndNumbersException extends \Exception
{
    public function __construct($message = "Line 2 must have only spaces and numbers", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
