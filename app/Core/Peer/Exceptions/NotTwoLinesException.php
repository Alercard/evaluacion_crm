<?php

namespace App\Core\Peer\Exceptions;

class NotTwoLinesException extends \Exception
{
    public function __construct($message = "Data must have two lines", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
