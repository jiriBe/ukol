<?php

namespace class\db;

use class\db as Db;
use class\variables as Variables;

class Select extends Db\Database{

    public function fceSelect() {

        $outputData = new Variables\OutputData;

        $outputData->result = '';

        if ($this->pdo) {
            $query = $this->pdo->prepare("SELECT * FROM `people` WHERE `screen` = ? ORDER BY `date` DESC");
            $query->execute([1]);

            while ($resultQuery = $query->fetchObject()) {
                $outputData->result .= '
                            <div class="boxList">
                                <div class="boxLeft firstName">' . $resultQuery->firstName . '</div>
                                <div class="boxLeft lastName">' . $resultQuery->lastName . '</div>
                                <div class="boxLeft mailClass"><a href="mailto:' . $resultQuery->mail . '" title="">' . $resultQuery->mail . '</a></div>
                                <div class="boxLeft phoneClass">' . ($resultQuery->phone == 0 ?
                    'Číslo nevloženo' : '<a href="tel:+420' . $resultQuery->phone . '">' . $resultQuery->phone . '</a>') . '</div>
                                <div class="boxLeft noteClass">' . ($resultQuery->note ? mb_substr($resultQuery->note, 0, 150, 'UTF-8') . '...' : 'Poznámka nevložena') . '</div>
                                <div class="boxLeft"><a onClick="return controlQuery();" href="?section=list&delete='
                . $resultQuery->code . '">Smazat</a> | <a href="?section=edit&token=' . $resultQuery->code . '">Editovat</a></div>
                            </div>';
            }

            if (!$outputData->result) {
                $outputData->result = '
                            <div class="boxList">
                               <div class="boxLeft">Žádný záznam...</div>
                            </div>';
            }
        }

        return $outputData->result;
    }

    public function fceSelectForUpdate($token) {

        $outputData = new Variables\OutputData;

        $outputData->string = (object) ['stop' => ''];

        if ($this->pdo) {
            $query = $this->pdo->prepare("SELECT * FROM `people` WHERE `screen` = ? AND `code` = ? LIMIT 1");
            $query->execute([1, $token]);

            $resultQuery = $query->fetchObject();

            if (isset($resultQuery->firstName) and
                isset($resultQuery->lastName) and
                isset($resultQuery->mail) and
                isset($resultQuery->note)) {
                if ($resultQuery->phone == 0) {
                    $outputData->phone = strtr($resultQuery->phone, [0 => '']);
                } else {
                    $outputData->phone = $resultQuery->phone;
                }

                $outputData->string = (object) [
                    'firstName' => $resultQuery->firstName,
                    'lastName' => $resultQuery->lastName,
                    'phone' => $outputData->phone,
                    'email' => $resultQuery->mail,
                    'note' => $resultQuery->note,
                    'myCode' => $resultQuery->code,
                    'stop' => false
                ];

                $outputData->myCode = true;
            } else {
                $outputData->string = (object) ['stop' => true];
            }

            if (!$outputData->myCode) {
                $outputData->string = (object) ['stop' => true, 'result' => '<div class="statusNo">Neuloženo, záznam nenalezen...</div>'];
            }
        }

        return $outputData;
    }
}