<?php

namespace App\Core\Peer\Exceptions;

class NotOneSpaceAndNotOnlyNumbersException extends \Exception
{
    public function __construct($message = "Line 1 must have one space and only numbers", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
