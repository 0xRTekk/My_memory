<?php
namespace Memory\Controller;

use Memory\Model\Manager\GameManager;

class GameController 
{
    /**
     * Instance d'une connexion PDO envoyee au manager
     * Recuperation des parties
     * Appel de la vue pour affichage dans lobby
     */
    public function getListAction()
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $game_manager = new GameManager($db);
        $game_list = $game_manager->getList();
        require_once(__DIR__ . '/../view/lobby.php');
    }

    /**
     * @param int $user_id
     * Instance d'une connexion PDO envoyee au manager
     * Recuperation et traitement des parties d'un joueur
     * pour les renvoyer
     * @return array $games_array
     */
    public function getListByUserAction(int $user_id)
    {
        $games_array = [];
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $game_manager = new GameManager($db);
        $game_obj_array = $game_manager->getListByUser($user_id);

        foreach ($game_obj_array as $game_obj) {
            $games_array[] = [
                'id' => $game_obj->id(),
                'start_date' => $game_obj->startDate(),
                'win' => $game_obj->win(),
                'time_played' => $game_obj->timePlayed(),
            ];
        }

        return $games_array;
    }

    /**
     * @param int $user_id
     * @param float $time
     * @param int $win
     * Instance d'une connexion PDO envoyee au manager
     * Appel de la methode de sauvegarde de partie du managger
     * renvoi un booleen
     * @return bool
     */
    public function addAction(int $is_user, float $time, int $win)
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $game_manager = new GameManager($db);
        return $game_manager->add($is_user, $time, $win);
    }
}