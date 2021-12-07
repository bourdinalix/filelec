<?php
namespace Models;
require_once("Models/Model.php");

class Appartenir extends Model{

    public function insertAppartenirProduits($tab)
    {
        if($this->pdo != null){
            $requete = "insert into appartenir values(:ref_commande, :ref_produit, :quantite_commander);";
            $donnee = array(":ref_commande" => $tab['ref_commande'], ":ref_produit" => $tab['ref_produit'], ":quantite_commander" => $tab['quantite_commander']);
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnee);
        }else{
            return null;
        }
    }


    public function selectAppartenirProduits($tab)
    {
        if($this->pdo != null){
            $requete = "select * from appartenir where ref_commande = :ref_commande";
            $donnee = array(":ref_commande" => $tab['ref_commande']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetchAll();
        }else{
            return null;
        }
    }

    public function deletePanier($tab)
    {
        if($this->pdo != null){
            $requete = "delete from appartenir where ref_commande = :ref_commande;";
            $donnee = array(":ref_commande" => $tab['ref_commande']);
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnee);
        }else{
            return null;
        }
    }
}