<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Produits.php");


class Produits extends Controller{
    private $lesProduits;

    public function __construct()
    {
        $this->lesProduits = new \Models\Produits();
    }

    public function selectAllProduits()
    {
        $produits = $this->lesProduits->selectAllProduits();
        return $produits;
    }

    public function selectTopVentes()
    {
        $produits = $this->lesProduits->selectTopVentes();
        return $produits;
    }

    public function selectWhereProduit($refProduit)
    {
        $produits = $this->lesProduits->selectWhereProduit($refProduit);
        return $produits;
    }

    public function insertProduit($tab)
    {
        $this->lesProduits->insertProduit($tab);
    }

    public function deleteProduit($tab)
    {
        $this->lesProduits->deleteProduit($tab);
    }

    public function updateProduit($tab)
    {
        $this->lesProduits->updateProduit($tab);
    }
}