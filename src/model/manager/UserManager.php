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


    // public function exists($nickname)
    // {
    //     $db = new Db();
    //     $db = $db->connect();
    //     $query = $db->query('SELECT id FROM user WHERE nickname = "'.$nickname.'"');
    //     $response = $query->fetch(\PDO::FETCH_ASSOC);
    //     $query->closeCursor();
    //     if ($response['id'] != null) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function add()
    // {
    //     $db = new Db();
    //     $db = $db->connect();
    //     $query = $db->prepare('INSERT INTO user (nickname, victories) VALUES (:nickname, :victories)');
    //     $query->execute([
    //         "nickname" => $this->nickname,
    //         "victories" => 0
    //     ]);
    //     $query->closeCursor();
    // }

    // public function getGames()
    // {
    //     $db = new Db();
    //     $db = $db->connect();
    //     $query = $db->prepare('SELECT date, win, time FROM game WHERE game.id_user = '.$this->id);
    //     $query->execute([
    //         "nickname" => $this->nickname,
    //         "victories" => 0
    //     ]);
    //     $query->closeCursor();
    // }

}