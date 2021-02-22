<?php
namespace Memory\Model;

class Game
{
    private $id;
    private $date;
    private $win;
    private $time_played;
    private $id_user;

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
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setWin($win)
    {
        $this->win = $win;
    }
    public function setTimePlayed($time_played)
    {
        $this->time_played = $time_played;
    }
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    //Getters
    public function id() { return $this->id; }
    public function date() { return $this->date; }
    public function win() { return $this->win; }
    public function timePlayed() { return $this->time_played; }
    public function idUser() { return $this->id_user; }
}

?>