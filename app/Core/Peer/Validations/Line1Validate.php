<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\NotOneSpaceAndNotOnlyNumbersException;

class Line1Validate {

    public static function validate($line1) {
        // line1 must have one space and only numbers
        if (substr_count($line1, " ") != 1 || !is_numeric(str_replace(" ", "", $line1))) {
            throw new NotOneSpaceAndNotOnlyNumbersException();
        }

    }
}
