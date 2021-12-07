<?php
namespace Models;
require_once("Models/Model.php");

class Account extends Model{

    public function selectMyAccount($tab)
    {
        if($this->pdo != null){
            $requete = "select * from client where email = :email;";
            $donnee = array(":email" => $tab['email']);
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetchAll();
        }else{
            return null;
        }
    }

    public function selectOrderPay($tab)
    {
        if($this->pdo != null){
            $requete = "select * from commandePayer where code_client = :code_client;";
            $donnee = array(":code_client" => $tab['code_client']); 
            $select = $this->pdo->prepare($requete);
            $select->execute($donnee);
            return $select->fetchAll();
        }else{
            return null;
        }
    }
}