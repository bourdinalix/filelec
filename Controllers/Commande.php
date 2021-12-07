<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Commande.php");


class Commande extends Controller{
    private $uneCommande;

    public function __construct()
    {
        $this->uneCommande = new \Models\Commande();
    }

    public function insertCommandeProduits($tab)
    {
        $this->uneCommande->insertCommandeProduits($tab);
    }

    public function selectWhereCommande($tab)
    {
        return $this->uneCommande->selectWhereCommande($tab);
    }

    public function updateEtat($tab)
    {
        $this->uneCommande->updateEtat($tab);
    }

    public function deleteCommande($tab)
    {
        $this->uneCommande->deleteCommande($tab);
    }

    public function getEtat($tab)
    {
        return $this->uneCommande->getEtat($tab);
    }
}