<?php

namespace App\Core\Peer\Process;

use App\Core\Peer\Exceptions\ValuesNotBetweenRangeAcceptedException;
use App\Core\Peer\Exceptions\ValuesNotUniqueException;
use App\Core\Peer\Validations\ArrayLengthValidate;
use App\Core\Peer\Validations\ArrayValueValidate;
use App\Core\Peer\Validations\DataParamValidate;
use App\Core\Peer\Validations\Line1Validate;
use App\Core\Peer\Validations\Line2Validate;
use App\Core\Peer\Validations\ObjetiveValueValidate;
use App\Core\Peer\Validations\SizeArrayDataValidate;

class GetPeersProcess {

    private $line1;
    private $line2;
    private $n = 0;
    private $k = 0;
    private $values = [];
    private $peers = [];
    private $results = 0;

    public function process($data) {

        return $this->decompose($data)
                    ->execute()
                    ->getResults();


    }

    public function getResults() {
        return $this->results;
    }

    private function decompose($data) {
        // validate data
        DataParamValidate::validate($data);
        $lines = explode("\n", $data);

        $this->line1 = $lines[0];
        Line1Validate::validate($this->line1);
        $line1Temp = explode(" ", $this->line1);
        $this->n = $line1Temp[0]*1;
        $this->k = $line1Temp[1]*1;
        SizeArrayDataValidate::validate($this->n);
        ObjetiveValueValidate::validate($this->k);

        $this->line2 = $lines[1];
        Line2Validate::validate($this->line2);
        $this->values = explode(" ", $this->line2);
        ArrayLengthValidate::validate($this->values, $this->n);

        return $this;

    }

    private function execute() {

        $this->results = 0;
        ArrayValueValidate::validate($this->values[0]);
        $this->values[0]*1;
        for ($i = 0; $i < $this->n; $i++) {
            for ($j = $i + 1; $j < $this->n; $j++) {

                ArrayValueValidate::validate($this->values[$j]);

                $this->values[$j]*1;

                $diff = abs($this->values[$i] - $this->values[$j]);

                // each item of arrayValues are unique
                if ($diff == 0) {
                    throw new ValuesNotUniqueException();
                }

                if ($diff == $this->k) {
                    $this->results++;
                    $this->peers[] = [$this->values[$i], $this->values[$j]];
                }
            }
        }

        return $this;
    }

}
