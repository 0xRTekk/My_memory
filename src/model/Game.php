<?php
namespace Memory\Model;

class Game
{
    private $id;
    private $start_date;
    private $win;
    private $time_played;
    private $id_user; //todo : changer id_user par Object USer

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
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setStartDate(string $start_date)
    {
        $this->start_date = $start_date;
    }
    public function setWin(bool $win)
    {
        $this->win = $win;
    }
    public function setTimePlayed(float $time_played)
    {
        $this->time_played = $time_played;
    }
    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

    //Getters
    public function id() { return $this->id; }
    public function startDate() { return $this->start_date; }
    public function win() { return $this->win; }
    public function timePlayed() { return $this->time_played; }
    public function idUser() { return $this->id_user; }
}

?>