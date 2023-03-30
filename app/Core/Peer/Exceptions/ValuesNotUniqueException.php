<?php

namespace App\Core\Peer\Exceptions;

class ValuesNotUniqueException extends \Exception
{
    public function __construct($message = "Values must be unique", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(__($message), $code, $previous);
    }
}
