<?php

namespace class\db;

use class\db as Db;
use class\variables as Variables;
use class\sec as Sec;

class Update extends Db\Database{

    public function fceDelete() {

        $inputData = $this->prepareInputData();

        if ($this->pdo) {
            $query = $this->pdo->prepare("UPDATE `people` SET `screen` = ? WHERE `code` = ?");
            $query->execute([0, $inputData]);
        }
    }

    public function fceUpdate($firstName, $lastName, $phone, $mail, $note, $token) {

        if ($this->pdo) {
            $query = $this->pdo->prepare("UPDATE `people` SET `firstName` = ?, `lastName` = ?, `phone` = ?, `mail` = ?, `note` = ? WHERE `code` = ?");
            $query->execute([$firstName, $lastName, $phone, $mail, $note, $token]);
        }
    }

    public function prepareInputData() {

        $inputData = new Variables\InputData;
        $inputData->code = Sec\Get::fceGet('delete');

        return $inputData->code;
    }
}