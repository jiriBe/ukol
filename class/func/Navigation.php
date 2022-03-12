<?php

namespace class\func;

use class\func as Func;
use class\variables as Variables;

class Navigation extends Func\SecLink{

    public function fceNavigation($patternNav, $patternLink) {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if ($inputData->secLink == $patternNav) {
            $outputData->css = ' linkActive';
        } else {
            $outputData->css = NULL;
        }

        if ($patternNav == 'settings') {
            $outputData->cssIcon = ' iconSettings';
        } else {
            $outputData->cssIcon = ' iconPrograming';
        }

        return '<a class="linkStatus' . $outputData->css . $outputData->cssIcon . '" href="?section=' . $patternNav . '">' . $patternLink . '</a>';
    }

    public function fceNavigationHome($patternNav) {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if ($inputData->secLink == NULL) {
            $outputData->css = ' linkActive';
        } else {
            $outputData->css = NULL;
        }

        return '<a class="linkStatusHome' . $outputData->css . '" href="' . $patternNav . '">
                    &nbsp;
                </a>';
    }

    public function fceNavigationMini($patternNav, $patternLink) {

        $outputData = new Variables\OutputData;

        if ($patternNav == '.') {
            $outputData->result = '<div class="naviDiv"><a href="' . $patternNav . '">' . $patternLink . '</a></div>';
        } else {
            $outputData->result = '<div class="naviDiv"><a href="?section=' . $patternNav . '">' . $patternLink . '</a></div>';
        }

        return $outputData->result;
    }

    public function prepareInputData() {

        $inputData = new Variables\InputData;
        $inputData->secLink = $this->fceSecLink('section');

        return $inputData;
    }
}
$navVariable = new Navigation;