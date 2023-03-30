<?php

namespace App\Core\Peer\Exceptions;

class ValueNotBetweenRangeAcceptedException extends \Exception
{
    public function __construct($message = "Value not between range accepted", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
