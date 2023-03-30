<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\ArrayNotEqualNException;

class ArrayLengthValidate {

    public static function validate($arrayValues, $n) {
        // size of arrayValues must be equal to n
        if (count($arrayValues) != $n) {
            throw new ArrayNotEqualNException();
        }
    }

}
