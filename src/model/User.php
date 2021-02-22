<?php

namespace Memory\Model;

class User
{
    //Properties
    private $id;
    private $nickname;
    private $victories;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
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
    public function setVictories($victories)
    {
        $this->victories = $victories;
    }

    //Getters
    public function id() { return $this->id; }
    public function nickname() { return $this->nickname; }
    public function victories() { return $this->victories; }
}
?>