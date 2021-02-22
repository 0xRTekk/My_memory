<?php
namespace Memory\Controller;

use Memory\Model\Manager\UserManager;

class UserController 
{
    public function existsAction(string $nickname)
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->exists($nickname);
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