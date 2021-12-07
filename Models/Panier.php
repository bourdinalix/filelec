<?php
namespace Models;
require_once("Models/Model.php");

class Panier extends Model{

    public function selectPanier($tab)
    {
        if($this->pdo != null){
            $requete = "SELECT * FROM panier where ref_commande = :ref_commande and date_cmde = :date_cmde;";
            $donnee = array('ref_commande' => $tab['ref_commande'], 'date_cmde' => $tab['date_cmde']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetchAll();
        }else{
            return null;
        }
    }

    public function selectTotalPanier($tab)
    {
        if($this->pdo != null){
            $requete = "SELECT sum(prix_total) as total FROM panier where ref_commande = :ref_commande and date_cmde = :date_cmde;";
            $donnee = array('ref_commande' => $tab['ref_commande'], 'date_cmde' => $tab['date_cmde']);
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
            $requete = "delete from panier where ref_commande = :ref_commande;";
            $donnee = array(":ref_commande" => $tab['ref_commande']);
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnee);
        }else{
            return null;
        }
    }

    public function updatePanier($tab)
    {
       if($this->pdo != null){
            $requete = "UPDATE panier SET quantite_commander = :quantite_commander WHERE ref_commande = :ref_commande AND ref_produit = :ref_produit;";
            $donnee = array(":quantite_commander" => $tab['quantite_commander'], ":ref_commande" => $tab['ref_commande'], ":ref_produit" => $tab['ref_produit']);
            $update = $this->pdo->prepare($requete);
            $update->execute($donnee);
       }else{
           return null;
       }
    }

    public function deleteProduitPanier($tab)
    {
        if($this->pdo != null){
            $requete = "DELETE from appartenir WHERE ref_commande = :ref_commande AND ref_produit = :ref_produit";
            $donnee = array(":ref_commande" => $tab['ref_commande'], ":ref_produit" => $tab['ref_produit']);
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnee);
        }else{
            return null;
        }
    }
}