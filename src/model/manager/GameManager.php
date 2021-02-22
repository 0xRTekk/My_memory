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
        $query = $this->db->query('SELECT g.id, g.start_date, g.time_played, u.nickname FROM memory.game g INNER JOIN memory.user u ON u.id = g.id_user ORDER BY time_played ASC');
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $games[] = $data;
        }
        return $games;
    }
}