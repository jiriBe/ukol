<?php

namespace class\func;

use class\func as Func;
use class\variables as Variables;

class SwitchInclude extends Func\SecLink{

    public function fceSwitchInclude() {

        $secLinkVariable = $this->fceSecLink('section');
        $outputData = new Variables\OutputData;

        switch ($secLinkVariable) {
        case 'list':
            $outputData->include = include 'section/contacts.php';
            break;
        case 'edit':
            $outputData->include = include 'section/editContact.php';
            break;
        default:
            $outputData->include = include 'section/default.php';
        }

        return $outputData;
    }
}
$switchIncludeVariable = new SwitchInclude;