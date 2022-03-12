<?php

namespace class\db;

use PDO, PDOException;

class Dbi {

    protected $pdo;

    public function __construct($sqlDbname, $sqlHost, $sqlUserName, $sqlPassword) {

        $dsn = 'mysql:dbname=' . $sqlDbname . ';host=' . $sqlHost . '';
        $user = $sqlUserName;
        $password = $sqlPassword;

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Spatne databazove spojeni: ' . $e->getMessage());
        }

    }

}