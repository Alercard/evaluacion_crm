<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\NotOnlySpacesAndNumbersException;

class Line2Validate {

    public static function validate($line1) {
        // line2 must have only spaces and numbers
        if (!is_numeric(str_replace(" ", "", $line1))) {
            throw new NotOnlySpacesAndNumbersException();
        }

    }
}
