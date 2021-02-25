<?php

namespace Memory\Model\Manager;

use Memory\Model\Card;

class CardManager 
{
    /**
     * @var \PDO pdo connection
     */
    private $db;

    /**
     * @param \PDO $db
     */
    public function __construct($db)
    {
        $this->setDb($db);
    }

    //Setters
    public function setDb(\PDO $db) { $this->db = $db; }

    /**
     * Recupère la liste des cartes depuis la base de données
     * Retourne un tableau d'objets Card
     * @return Array $cards
     */
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