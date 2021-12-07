<?php
namespace Models;
require_once("Models/Model.php");

class Commande extends Model{

    public function insertCommandeProduits($tab)
    {
        if($this->pdo != null){
            $requete = "insert into commande values(null, :code_client, :date_cmde, :etat);";
            $donnee = array(":code_client" => $tab['code_client'], ":date_cmde" => $tab['date_cmde'], ":etat" => $tab['etat']);
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnee);
        }else{
            return null;
        }
    }

    public function selectWhereCommande($tab)
    {
        if($this->pdo != null){
            $requete = "select * from commande where code_client = :code_client and date_cmde = :date_cmde order by ref_commande desc;";
            $donnee = array(":code_client" => $tab['code_client'], ":date_cmde" => $tab['date_cmde']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetch();
        }else{
            return null;
        }
    }

    public function updateEtat($tab)
    {
        if($this->pdo != null){
            $requete = "update commande set etat = :etat where ref_commande = :ref_commande;";
            $donnee = array(":etat" => $tab['etat'], ":ref_commande" => $tab['ref_commande']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
        }else{
            return null;
        }
    }

    public function deleteCommande($tab)
    {
        if($this->pdo != null){
            $requete = "delete from commande where ref_commande = :ref_commande;";
            $donnee = array(":ref_commande" => $tab['ref_commande']);
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnee);
        }else{
            return null;
        }
    }

    public function getEtat($tab){
        if($this->pdo != null){
            $requete = "select etat from commande where ref_commande = :ref_commande;";
            $donnee = array(":ref_commande" => $tab['ref_commande']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetch();
        }else{
            return null;
        }
    }
}


