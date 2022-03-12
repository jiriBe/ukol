<?php

namespace class\sec;

use class\variables as Variables;

class Get {

    public static function fceGet($pattern) {

        $outputData = new Variables\OutputData;

        if (isset($_GET[$pattern])) {
            $outputData->result = strip_tags($_GET[$pattern]);
            $outputData->result = htmlspecialchars($outputData->result, ENT_QUOTES, 'UTF-8');
            $outputData->result = trim(addslashes($outputData->result));
        } else {
            $outputData->result = '';
        }

        return $outputData->result;
    }
}