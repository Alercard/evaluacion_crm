<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\ValueNotBetweenRangeAcceptedException;

class ObjetiveValueValidate {

    public static function validate($objetiveValue) {
        // validate objetiveValue is between 0 and 10^9
        if ($objetiveValue < 0 || $objetiveValue > 1000000000) {
            throw new ValueNotBetweenRangeAcceptedException();
        }

    }
}
