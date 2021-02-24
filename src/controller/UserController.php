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

    public function addAction(String $nickname)
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->add($nickname);
    }

    public function getLastInsertedAction()
    {
        $db = new \PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'memory', 'memory');
        $user_manager = new UserManager($db);
        return $user_manager->getLastInserted();
    }
}