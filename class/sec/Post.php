<?php

namespace class\sec;

use class\variables as Variables;

class Post {

    public static function fcePost($pattern) {

        $outputData = new Variables\OutputData;

        if (isset($_POST[$pattern])) {
            $outputData->result = strip_tags($_POST[$pattern]);
            $outputData->result = htmlspecialchars($outputData->result, ENT_QUOTES, 'UTF-8');
            $outputData->result = trim(addslashes($outputData->result));
        } else {
            $outputData->result = '';
        }

        return $outputData->result;
    }
}