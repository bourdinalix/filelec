<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Connexion.php");


class Connexion extends Controller{
    private $uneConnexion;

    public function __construct()
    {
        $this->uneConnexion = new \Models\Connexion();
    }

    public function connexion($tab)
    {
        $connexion = $this->uneConnexion->connexion($tab);
        return $connexion;
    }

    public function adminConnexion($tab)
    {
        $connexion = $this->uneConnexion->adminConnexion($tab);
        return $connexion;
    }
}