<?php

namespace App\Core\Peer\Exceptions;

class ValuesNotBetweenRangeAcceptedException extends \Exception
{
    public function __construct($message = "Values not between range accepted", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
