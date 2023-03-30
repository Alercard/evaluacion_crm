<?php

namespace App\Core\Peer\Validations;

use App\Core\Peer\Exceptions\NotTwoLinesException;

class DataParamValidate {

    public static function validate($data) {
        // validate data is string and has two lines
        if (is_string($data) && substr_count($data, "\n") != 1) {
            throw new NotTwoLinesException();
        }

    }
}
