<?php

namespace Memory\Model\Manager;

use Memory\Model\Card;

class CardManager 
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(\PDO $db)
    {
        $this->db = $db;
    }
}