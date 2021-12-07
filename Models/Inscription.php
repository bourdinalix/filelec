<?php 
namespace Models;
require_once("Models/Model.php");

class Inscription extends Model{
    protected $table = "client";

    public function inscriptionParticulier($tab){
        if($this->pdo != null){
            $requete = "insert into particulier values(null, :nom_ville, :prenom, :nom, :adresse, :email, :telephone, :mdp);";

            $donnee = array(":nom_ville" => $tab['nom_ville'], ":prenom" => $tab['prenom'], ":nom" => $tab['nom'], ":adresse" => $tab['adresse'], ":email" => $tab['email'], ":telephone" => $tab['telephone'], ":mdp" => $tab['mdp']);

            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnee);
        }
    }

    public function inscriptionEntreprise($tab){
        if($this->pdo != null){
            $requete = "insert into entreprise values(null, :nom_ville, :numsiret, :nom, :adresse, :email, :telephone, :mdp);";

            $donnee = array(":nom_ville" => $tab['nom_ville'], ":numsiret" => $tab['prenom'], ":nom" => $tab['nom'], ":adresse" => $tab['adresse'], ":email" => $tab['email'], ":telephone" => $tab['telephone'], ":mdp" => $tab['mdp']);

            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnee);
        }
    }
}