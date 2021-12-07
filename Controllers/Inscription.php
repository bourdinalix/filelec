<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Inscription.php");


class Inscription extends Controller{
    private $uneInscription;

    public function __construct()
    {
        $this->uneInscription = new \Models\Inscription();
    }

    public function inscriptionParticulier($tab)
    {
        $inscription = $this->uneInscription->inscriptionParticulier($tab);
    }

    public function inscriptionEntreprise($tab)
    {
        $inscription = $this->uneInscription->inscriptionEntreprise($tab);
    }
}