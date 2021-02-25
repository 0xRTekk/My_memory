<?php

namespace Memory\Model\Manager;

use Memory\Model\User;

class UserManager 
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
     * @param Srting $nickname
     * Check l'existance du joueur en base de données
     */
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

    /**
     * @param Srting $nickname
     * @return bool
     * Ajoute un joueur en base de données
     */
    public function add(String $nickname)
    {
        // Préparation de la requete
        $query = $this->db->prepare('INSERT INTO user (nickname, victories) 
            VALUES (:nickname, :victories)');
        // Execution de la requete
        $query->execute([
            "nickname" => $nickname,
            "victories" => 0
        ]);
        // Ferme le curseur, permettant à la requête d'être de nouveau exécutée
        $query->closeCursor();
        return true;
    }

    /**
     * @return User $user
     * Récupère le joueur qui vient d'etre enregistre en base
     * Renvoie une instance de User
     */
    public function getLastInserted()
    {
        $query = $this->db->query('SELECT * FROM memory.user u ORDER BY id DESC LIMIT 1');
        $response = $query->fetch(\PDO::FETCH_ASSOC);
        $user = new User($response);
        return $user;
    }
}