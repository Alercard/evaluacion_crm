<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\ValuesNotBetweenRangeAcceptedException;

class ArrayValueValidate {

    public static function validate($values) {
        if ($values < 0 || $values > 2147483647) {
            throw new ValuesNotBetweenRangeAcceptedException();
        }

    }

}
