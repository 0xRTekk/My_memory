<?php

namespace Memory\Model\Manager;

class UserManager 
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


    public function exists($nickname)
    {
        $query = $this->db->query('SELECT id FROM memory.user WHERE nickname = "'.$nickname.'"');
        $response = $query->fetch();
        return $response;
    }

    public function add()
    {
        $query = $this->db->prepare('INSERT INTO user (nickname, victories) VALUES (:nickname, :victories)');
        $query->execute([
            "nickname" => $this->nickname,
            "victories" => 0
        ]);
        $query->closeCursor();
    }

    public function getGames()
    {
        $query = $this->db->prepare('SELECT date, win, time FROM game WHERE game.id_user = '.$this->id);
        $query->execute([
            "nickname" => $this->nickname,
            "victories" => 0
        ]);
        $query->closeCursor();
    }

}