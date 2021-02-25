<?php
namespace Memory\Controller;

use Memory\Model\Manager\UserManager;

class UserController 
{
    /**
     * @param string $nickname
     * Instance d'une connexion PDO envoyee au manager
     * Appel methode du manager 
     * Retourne un booleen
     * @return bool
     */
    public function existsAction(string $nickname)
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->exists($nickname);
    }

    /**
     * @param string $nickname
     * Instance d'une connexion PDO envoyee au manager
     * Appel methode du manager 
     * Retourne un booleen
     * @return bool
     */
    public function addAction(String $nickname)
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->add($nickname);
    }

    /**
     * Instance d'une connexion PDO envoyee au manager
     * Appel methode du manager 
     * Retourne un booleen
     * @return bool
     */
    public function getLastInsertedAction()
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->getLastInserted();
    }
}