<?php
namespace Memory\Model\Manager;

use Memory\Model\Game;

class GameManager
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->setDb($db);
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        $games = [];
        $query = $this->db->query('SELECT * FROM game');
        while ($data = $query->fetch()) {
            $games[] = new Game($data);
        }
        return $games;
    }
}