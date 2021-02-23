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

    public function add(int $id_user, float $time, int $win)
    {
        $query = $this->db->prepare('INSERT INTO memory.game (start_date, win, time_played, id_user) VALUES (:start_date, :win, :time_played, :id_user)');
        $query->execute([
            "start_date" => date("d-m-yy"),
            "win" => $win,
            "time_played" => $time,
            "id_user" => $id_user
        ]);
        $query->closeCursor();
        return true;
    }
}