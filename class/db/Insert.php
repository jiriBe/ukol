<?php

namespace class\db;

use class\db as Db;

class Insert extends Db\Database{

    public function fceInsert($firstName, $lastName, $phone, $mail, $note, $code) {

        if ($this->pdo) {
            $query = $this->pdo->prepare("INSERT INTO `people` (`id`, `firstName`, `lastName`, `phone`, `mail`, `note`, `date`, `code`, `screen`)
            VALUES(?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
            $query->execute([NULL, $firstName, $lastName, $phone, $mail, $note, $code, 1]);
        }
    }
}