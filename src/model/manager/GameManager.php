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
        $query = $this->db->query('SELECT * FROM game ORDER BY time_played ASC');
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $games[] = new Game($data);
        }
        return $games;
    }
}