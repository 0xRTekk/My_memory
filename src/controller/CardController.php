<?php
namespace Memory\Controller;

use Memory\Model\Manager\CardManager;

class CardController 
{
    public function getListAction()
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $card_manager = new CardManager($db);
        // $cards = $card_manager->getList();
        $deck_cards = $this->prepareDeck($card_manager->getList());
        require_once(__DIR__ . '/../view/game.php');
    }

    private function prepareDeck(array $cards)
    {
        // shuffle($cards);
        $cards1 = $cards;
        $cards2 = $cards;
        $deck = array_merge_recursive($cards1, $cards2);
        shuffle($deck);
        return $deck;
    }
}