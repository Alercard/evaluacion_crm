<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\SizeNotBetweenRangeAcceptedException;

class SizeArrayDataValidate {

    public static function validate($sizeArray) {
        // validate sizeArray is between 2 and 10^5
        if ($sizeArray < 2 || $sizeArray > 100000) {
            throw new SizeNotBetweenRangeAcceptedException();
        }

    }
}
