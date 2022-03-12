<?php

namespace class\func;

use class\func as Func;
use class\variables as Variables;

class SwitchMeta extends Func\SecLink{

    public function fceSwitchMeta() {

        $secLinkVariable = $this->fceSecLink('section');
        $outputData = new Variables\OutputData;

        switch ($secLinkVariable) {
        case 'edit':
            $outputData->title = 'Editace kontaktu';
            $outputData->keywords = 'Editace, kontakty';
            $outputData->description = 'Editace kontaku z formuláře.';
            break;
        case 'list':
            $outputData->title = 'Výpis kontaktů';
            $outputData->keywords = 'výpis kontaktů';
            $outputData->description = 'Vypsání kontaktů, zadaných od uživatelů.';
            break;
        default:
            $outputData->title = 'Vložení kontaktu';
            $outputData->keywords = 'vložení, kontakt';
            $outputData->description = 'Vložení kontaktů do databáze.';
        }

        return $outputData;
    }
}
$switchVariable = new SwitchMeta;