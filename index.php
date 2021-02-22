<?php
require_once realpath("vendor/autoload.php");

use Memory\Controller\GameController;
use Memory\Controller\UserController;

if (empty($_GET)) {
    //GameController 
        // Va récup les derniers meilleurs temps
        // Si un utilisateur est connecte : recup ses derniers meilleurs temps
        // Affiche les données dans un template
        $game_controller = new GameController();
        $game_controller->getListAction();
}
if (isset($_GET['action']) && $_GET['action'] == "connect") {
    //UserController
        //Verif existence user
        //OUI -> Recup ses derniers temps et les renvoi à la vue
        //NON -> creer user
    $input_nickname = $_GET['input_nickname'];
    $user_controller = new UserController();

    if (!$user_controller->existsAction($input_nickname)) {
        echo json_encode('0');
    } else {
        echo json_encode('1');
    }
    
    
}
if (isset($_GET['action']) && $_GET['action'] == "start-game") {
    //Recupère le User 
    //Envoi sur la page de jeu
}