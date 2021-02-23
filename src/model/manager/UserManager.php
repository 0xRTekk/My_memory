<?php

namespace Memory\Model\Manager;

use Memory\Model\User;

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

    public function exists(String $nickname)
    {
        $query = $this->db->query('SELECT * FROM memory.user WHERE nickname = "'.$nickname.'"');
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        if (!is_array($data)) {
            return false;
        }
        $user = new User($data);
        return $user;
    }

    public function add(String $nickname)
    {
        $query = $this->db->prepare('INSERT INTO user (nickname, victories) VALUES (:nickname, :victories)');
        $query->execute([
            "nickname" => $nickname,
            "victories" => 0
        ]);
        $query->closeCursor();
        return true;
    }

    public function getLastInserted()
    {
        $query = $this->db->query('SELECT * FROM memory.user u ORDER BY id DESC LIMIT 1');
        $response = $query->fetch(\PDO::FETCH_ASSOC);
        $user = new User($response);
        return $user;
    }

    public function getGames(int $user_id)
    {
        $query = $this->db->query('SELECT g.start_date, g.win, g.time_played FROM memory.game g WHERE g.id_user = '.$user_id);
        $response = $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $response;
    }
}