<?php
namespace Models;
require_once("Models/Model.php");

class Produits extends Model{

    public function selectAllProduits()
    {
        if($this->pdo != null){
            $requete = "SELECT * FROM produit;";
            $select = $this->pdo->prepare($requete);
            $select->execute();
            $produits = $select->fetchAll();
            return $produits;
        }else{
            return null;
        }
    }

    public function selectTopVentes()
    {
        if($this->pdo != null){
            $requete = "SELECT * FROM topSellProducts;";
            $select = $this->pdo->prepare($requete);
            $select->execute();
            $produits = $select->fetchAll();
            return $produits;
        }else{
            return null;
        } 
    }

    public function selectWhereProduit($refProduit)
    {
        if($this->pdo != null){
            $requete = "SELECT * FROM produit WHERE ref_produit = :ref_produit;";
            $donnee = array(":ref_produit" => $refProduit);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            $produits = $select->fetch();
            return $produits;
        }else{
            return null;
        }
    }

    public function insertProduit($tab)
    {
        if($this->pdo != null){
            $requete = "insert into produit values(null, :numero_unite, :nom, :prix, :quantite, :nb_vente, :img);";
            $donnee = array(":numero_unite" => $tab['unite'], ":nom" => $tab['nom'], ":prix" => $tab['prix'], ":quantite" => $tab['qte'], ":nb_vente" => $tab['nb_vente'], ":img" => $tab['img']);
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnee);
        }else{
            return null;
        }
    }

    public function deleteProduit($tab)
    {
        if($this->pdo != null){
            $requete = "delete from produit where ref_produit = :ref_produit;";
            $donnee = array(":ref_produit" => $tab['ref_produit']);
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnee);
        }else{
            return null;
        }
    }

    public function updateProduit($tab)
    {
       if($this->pdo != null){
            $requete = "UPDATE produit SET numero_unite = :numero_unite, nom = :nom, prix = :prix, quantite = :quantite, img = :img WHERE ref_produit = :ref_produit;";
            $donnee = array(":ref_produit" => $tab['ref_produit'],
                            ":numero_unite" => $tab['numero_unite'],
                            ":nom" => $tab['nom'],
                            ":prix" => $tab['prix'],
                            ":quantite" => $tab['quantite'],
                            ":img" => $tab['img']);
            $update = $this->pdo->prepare($requete);
            $update->execute($donnee);
       }else{
           return null;
       }
    }
}