<?php

namespace Memory\Model;

class User
{
    //Properties
    private $id;
    private $nickname;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            // On passe chaque première lettre en majuscule
            // On retire les underscores
            $key_transformed = ucwords($key, "_");
            $key_transformed = str_replace("_", "", $key_transformed);
            $method = 'set'.ucfirst($key_transformed);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    //Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    //Getters
    public function id() { return $this->id; }
    public function nickname() { return $this->nickname; }
}
?>