<?php
namespace Memory\Model\Manager;

use Memory\Model\Game;

class GameManager
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
     * Recupère la liste des parties en base de données
     * avec le pseudo du joueur associé
     * @return Array $games
     */
    public function getList()
    {
        $games = [];
        // Jointure entre 2 tables grace a un identifiant en commen : id_user
        $query = $this->db->query('SELECT g.id, g.start_date, g.time_played, u.nickname 
            FROM memory.game g 
            INNER JOIN memory.user u ON u.id = g.id_user 
            WHERE g.win = 1
            ORDER BY g.time_played LIMIT 10');
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $games[] = $data;
        }
        $query->closeCursor();
        return $games;
    }

    /**
     * @param int $user_id
     * Recupère la liste des parties d'un joueur
     * Retourne un tableau d'objet Game
     * @return Array $games
     */
    public function getListByUser(int $user_id)
    {
        $games = [];
        $query = $this->db->query('SELECT g.id, g.start_date, g.win, g.time_played 
            FROM memory.game g 
            WHERE g.id_user = '.$user_id.' AND g.win = 1
            ORDER BY g.time_played LIMIT 10');
        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $data) {
            $games[] = new Game($data);
        }
        $query->closeCursor();
        return $games;
    }

    /**
     * @param int $id_user
     * @param float $time
     * @param int $win
     * Sauvegarde une partie en base de données
     * @return bool
     */
    public function add(int $id_user, float $time, int $win)
    {
        // Preparation de la requete 
        $query = $this->db->prepare('INSERT INTO memory.game (start_date, win, time_played, id_user) 
            VALUES (:start_date, :win, :time_played, :id_user)');
        // Execution de la requete
        $query->execute([
            "start_date" => date("d-m-yy"),
            "win" => $win,
            "time_played" => $time,
            "id_user" => $id_user
        ]);
        // Ferme le curseur, permettant à la requête d'être de nouveau exécutée
        $query->closeCursor();
        return true;
    }
}