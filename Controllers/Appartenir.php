<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Appartenir.php");


class Appartenir extends Controller{
    private $unPanier;

    public function __construct()
    {
        $this->unPanier = new \Models\Appartenir();
    }

    public function insertAppartenirProduits($tab)
    {
        $panier = $this->unPanier->insertAppartenirProduits($tab);
    }

    public function selectAppartenirProduits($tab)
    {
        return $this->unPanier->selectAppartenirProduits($tab);
    }

    public function deletePanier($tab)
    {
        $this->unPanier->deletePanier($tab);
    }
}