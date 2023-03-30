<?php

namespace App\Core\Peer\Exceptions;

class SizeNotBetweenRangeAcceptedException extends \Exception
{
    public function __construct($message = "Line 1: Size must be between range accepted", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
