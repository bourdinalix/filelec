<?php
    require_once("Controllers/Inscription.php");
    $unController = new \Controllers\Inscription();

    $success = "";
    $error = "";

    if(isset($_POST['inscription'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom_ville = htmlspecialchars($_POST['nom_ville']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mdp2 = htmlspecialchars($_POST['confirm_mdp']);


        if(isset($nom) && isset($prenom) && isset($nom_ville) && isset($adresse) && isset($email) && isset($telephone) && isset($mdp) && isset($mdp2)){
            if($mdp === $mdp2){
                if(isset($_POST['type_client'])){
                    $unController->inscriptionEntreprise($_POST);
                    $success = "Inscription réussie en tant qu'entreprise";
                }else{
                    $unController->inscriptionParticulier($_POST);
                    $success = "Inscription réussie en tant que particulier";
                }
            }else{
                $error = "Veuillez renseigner les meme mots de passe";
            }
        }else{
            $error = "Veuillez renseigner tous les champs";
        }
    }
    
    require_once("Views/view_inscription.php");

    