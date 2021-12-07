<?php
namespace Models;
require_once("Models/Model.php");

class Connexion extends Model{

    public function connexion($tab)
    {
        if($this->pdo != null){
            $requete = "select * from client where email = :email and mdp = :mdp;";
            $donnee = array(":email" => $tab['email'], ":mdp" => $tab['mdp']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetch();
        }else{
            return null;
        }
    }

    public function adminConnexion($tab)
    {
        if($this->pdo != null){
            $requete = "select * from admins where username = :username and mdp = :mdp;";
            $donnee = array(":username" => $tab['email'], ":mdp" => $tab['mdp']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetch();
        }else{
            return null;
        }
    }
}