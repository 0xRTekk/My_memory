<?php
namespace Memory\Controller;

use Memory\Model\Manager\GameManager;

class GameController 
{
    public function getListAction()
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $game_manager = new GameManager($db);
        $game_list = $game_manager->getList();
        // echo '<pre>';
        // var_dump($game_list);
        // echo '</pre>';
        require_once(__DIR__ . '/../view/lobby.php');
    }
    



    // require la vue du Lobby
        // Affichage d'une div principale avec les derniers meilleurs temps
        // Une colonne à droite avec les temps du joueur qui va se connecter (ligne '--' si vide)
        // Une modale formulaire Pseudo (avec le reste de la page floutée)
        // une fois formulaire envoyé, requete AJAX vers UserController 
        //(instance User avec nickname passé en param AJAX, UserManager->userExists(User $user)) 
        //OUI : hydrate + recup games et return json_encode(array('userExists' => 1, 'user' => User $user, 'games' => array $games))
            //-> AJAX.success : si userExists rempli la colonne de droite + hide modale et enlève opacité du fond
        //NON : addNewUser, hydrate avec les infos, return games
            //-> AJAX.success : si !userExists hide modale et enlève opacité du fond
}