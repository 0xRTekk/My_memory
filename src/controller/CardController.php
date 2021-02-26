<?php
namespace Memory\Controller;

use Memory\Model\Manager\CardManager;

class CardController 
{
    /**
     * Instance d'une connexion PDO envoyee au manager
     * Recuperation et melange des cartes
     * Appel de la vue pour affichage sur game board
     */
    public function getListAction()
    {
        $db = new \PDO('mysql:host=mysql;dbname=memory;charset=utf8', 'memory', 'memory');
        $card_manager = new CardManager($db);
        $deck_cards = $this->prepareDeck($card_manager->getList());
        require_once(__DIR__ . '/../view/game.php');
    }

    /**
     * @param array $cards
     * Scope de la methode : privee
     * Melange aleatoirement 2 jeux de cartes similaires ensemble
     * pour renvoyer un deck contitue de paires
     * @return array $deck
     */
    private function prepareDeck(array $cards)
    {
        $cards1 = $cards;
        $cards2 = $cards;
        $deck = array_merge_recursive($cards1, $cards2);
        shuffle($deck);
        return $deck;
    }
}