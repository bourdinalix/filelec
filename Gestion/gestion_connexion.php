<?php
    require_once("Controllers/Connexion.php");
    $unController = new \Controllers\Connexion();

    $result = "";

    if(isset($_POST['connexion'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
          
        if(isset($email) && isset($mdp)){
            if($email != "admin"){
                $uneConnexion = $unController->connexion($_POST);
                if(isset($uneConnexion['code_client'])){
                    $_SESSION['code_client'] = $uneConnexion['code_client'];
                    $_SESSION['email'] = $uneConnexion['email'];
                    $_SESSION['nom'] = $uneConnexion['nom'];
                    header("Location: index.php?page=2");
                }else{
                    $result = "Veuillez vérifier vos identifiants";
                }
            }else if($email == "admin"){
                $uneConnexion = $unController->adminConnexion($_POST);
                if(isset($uneConnexion['id_admin'])){
                    $_SESSION['id_admin'] = $uneConnexion['id_admin'];
                    $_SESSION['username'] = $uneConnexion['username'];
                    header("Location: index.php?page=8");
                }else{
                    $result = "Veuillez vérifier vos identifiants";
                }
            }
        }
    }
    
    require_once("Views/view_connexion.php");