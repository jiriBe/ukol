<?php

namespace class\func;

use class\variables as Variables;

class SessionToken {

    public function fceSessionToken($pattern, $token) {

        $outputData = new Variables\OutputData;

        if (isset($_GET[$pattern])) {
            $outputData->result = $_SESSION[$pattern] = $token;
        } else {
            $outputData->result = 'storno';
        }

        return $outputData->result;
    }
}