<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Panier.php");


class Panier extends Controller{
    private $panier;

    public function __construct()
    {
        $this->panier = new \Models\Panier();
    }

    public function selectPanier($tab)
    {
        return $this->panier->selectPanier($tab);
    }

    public function selectTotalPanier($tab)
    {
        return $this->panier->selectTotalPanier($tab);
    }

    public function deletePanier($tab)
    {
        $this->panier->deletePanier($tab);
    }

    public function updatePanier($tab)
    {
        $this->panier->updatePanier($tab);
    }

    public function deleteProduitPanier($tab)
    {
        $this->panier->deleteProduitPanier($tab);
    }
}