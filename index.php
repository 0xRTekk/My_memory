<?php
require_once realpath("vendor/autoload.php");

use Memory\Controller\GameController;

if (empty($_GET)) {
    //GameController 
        // Va récup les derniers meilleurs temps
        // Si un utilisateur est connecte : recup ses derniers meilleurs temps
        // Affiche les données dans un template
        $game_controller = new GameController();
        $game_controller->getListAction();
    
    
}
if (isset($_GET['action']) && $_GET['action'] == "start-game") {
    //Recupère le User 
    //Envoi sur la page de jeu
}