<?php

namespace class\func;

use class\Variables as Variables;

class PostValid {

    public static function fcePostValidNumStr($patternPost, $typeVariable) {

        $outputData = new Variables\OutputData;

        if (isset($_POST[$patternPost])) {
            if ($_POST[$patternPost] == NULL) {
                $outputData->result = $typeVariable;
            } else {
                $outputData->result = addslashes($_POST[$patternPost]);
            }
        } else {
            $outputData->result = NULL;
        }

        return $outputData->result;
    }

    public static function fcePostValidIf($patternPost, $patternNumber) {

        $outputData = new Variables\OutputData;

        if (isset($_POST[$patternPost])) {
            if ($_POST[$patternPost] == NULL or !is_numeric($_POST[$patternPost]) or $_POST[$patternPost] == 0) {
                $outputData->result = $patternNumber;
            } else {
                $outputData->result = abs(addslashes($_POST[$patternPost]));
            }
        } else {
            $outputData->result = NULL;
        }

        return $outputData->result;
    }
}