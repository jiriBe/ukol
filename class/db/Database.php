<?php

namespace class\db;

use class\db as Db;

class Database extends Db\Dbi{

    private $sqlHost = 'localhost';
    private $sqlDbname = 'seznam';
    private $sqlUserName = 'root';
    private $sqlPassword = '';

    public function __construct() {

        parent::__construct($this->sqlDbname, $this->sqlHost, $this->sqlUserName, $this->sqlPassword);

    }

}