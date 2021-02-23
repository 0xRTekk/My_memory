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

    public function getList()
    {
        $cards = [];
        $query = $this->db->query('SELECT c.id, c.name, c.description FROM memory.card c');
        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $data) {
            $cards[] = new Card($data);
        }
        return $cards;
    }
}