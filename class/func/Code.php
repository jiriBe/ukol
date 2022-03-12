<?php

namespace class\func;

use class\Variables as Variables;

class Code {

    public function fceCode() {

        $outputData = new Variables\OutputData;

        $outputData->result = md5(mt_rand(0, 99999999999999999) . '_' . time());
        $outputData->result = mb_substr($outputData->result, mt_rand(5, 12), mt_rand(20, 32));

        return $outputData->result;

    }

}