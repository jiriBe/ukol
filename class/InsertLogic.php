<?php

namespace class;

use class\variables as Variables;
use class\sec as Sec;

class InsertLogic {

    public function getFirstName() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if (strlen($inputData->firstName) >= 2) {
            $outputData->firstName = $inputData->firstName;
        } elseif (isset($_POST['firstName'])) {
            $outputData->firstName = $inputData->firstName;
            $outputData->msg = '<br /><span class="redBoldSmall">Křestní jméno není vyplněno</span>';
            $outputData->stop = true;
        } else {
            $outputData->stop = true;
        }

        return $outputData;
    }

    public function getLastName() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if (strlen($inputData->lastName) >= 2) {
            $outputData->lastName = $inputData->lastName;
        } elseif (isset($_POST['lastName'])) {
            $outputData->lastName = $inputData->lastName;
            $outputData->msg = '<br /><span class="redBoldSmall">Příjmení není vyplněno</span>';
            $outputData->stop = true;
        } else {
            $outputData->stop = true;
        }

        return $outputData;
    }

    public function getEmail() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if (filter_var($inputData->email, FILTER_VALIDATE_EMAIL)) {
            $outputData->email = $inputData->email;
            $outputData->msg = '';
        } elseif (isset($_POST['mail'])) {
            $outputData->email = $inputData->email;
            $outputData->msg = '<br /><span class="redBoldSmall">Email není vyplněn správně</span>';
            $outputData->stop = true;
        } else {
            $outputData->stop = true;
        }

        return $outputData;
    }

    public function getPhone() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if ($inputData->phone) {
            $outputData->phone = $inputData->phone;
        } elseif (isset($_POST['phone'])) {
            $outputData->msg = '<br /><span class="redBoldSmall">Špatně vyplněné telefonní číslo</span>';
            $outputData->stop = true;
        } else {
            $outputData->stop = true;
        }

        return $outputData;
    }

    public function getNote() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if ($inputData->note) {
            $outputData->note = $inputData->note;
        } else {
            $outputData->note = '';
        }

        return $outputData;
    }

    public function getCode() {

        $outputData = new Variables\OutputData;
        $inputData = $this->prepareInputData();

        if ($inputData->code != null) {
            $outputData->myCode = $inputData->code;
        } else {
            $outputData->stop = true;
        }

        return $outputData;
    }

    public function prepareInputData() {

        $inputData = new Variables\InputData;
        $inputData->firstName = Sec\Post::fcePost('firstName');
        $inputData->lastName = Sec\Post::fcePost('lastName');
        $inputData->phone = Sec\Post::fcePost('phone');
        $inputData->email = Sec\Post::fcePost('mail');
        $inputData->note = Sec\Post::fcePost('note');
        $inputData->code = Sec\Get::fceGet('token');

        return $inputData;
    }
}