<?php
require_once realpath("vendor/autoload.php");

use Memory\Controller\GameController;
use Memory\Controller\UserController;
use Memory\Controller\CardController;

if (empty($_GET) && empty($_POST)) {
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
    $user = $user_controller->existsAction($input_nickname);
    if (!$user) {
        //Creation User
        $user_controller->addAction($input_nickname);
        $user_created = $user_controller->getLastInsertedACtion();
        echo json_encode(array(
            'user_id' => (int)$user_created->id(),
            'nickname' => $user_created->nickname(),
            'victories' => (int)$user_created->victories()
        ));
    } else {
        //Recup des dernieres Games du User
        $games = $user_controller->getUserGamesAction($user['id']);
        echo json_encode(array('games' => $games));
    }
}
if (isset($_GET['action']) && $_GET['action'] == "start_game") {
    $card_controller = new CardController();
    $card_controller->getListAction();

    //Recupère le User pour le save de la partie
    //Recupère les cartes en Db
    //Ouverture d'une modale de jeu
}