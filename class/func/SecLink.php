<?php

namespace class\func;

use class\variables as Variables;

class SecLink {

    public function fceSecLink($patternPost) {

        $outputData = new Variables\OutputData;

        if (isset($_GET[$patternPost])) {
            $outputData->result = htmlspecialchars($_GET[$patternPost], ENT_QUOTES);
            $outputData->result = addslashes($outputData->result);
            $outputData->result = trim(strip_tags($outputData->result));
        } else {
            $outputData->result = NULL;
        }

        return $outputData->result;
    }
}