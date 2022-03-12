<?php

namespace class\func;

use class\variables as Variables;

class BrowserTest {

    public function fceBrowserTestIcon() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            if (!empty(strstr($inputData->userAgent, 'OPR')) or !empty(strstr($inputData->userAgent, 'Opera'))) {
                $outputData->result = '<link rel="shortcut icon" href="img/ico.ico" />
                                       <link rel="icon" href="img/ico.ico" type="image/x-icon" />';
            } else {
                $outputData->result = '<link rel="shortcut icon" href="img/ico.png" type="image/png" />';
            }
        } else {
            $outputData->result = '<link rel="shortcut icon" href="img/ico.png" type="image/png" />';
        }

        return $outputData->result;
    }

    public function prepareInputData() {

        $inputData = new Variables\InputData;
        $inputData->userAgent = $_SERVER['HTTP_USER_AGENT'];

        return $inputData;
    }
}
$resultBrowserTestInst = new BrowserTest;