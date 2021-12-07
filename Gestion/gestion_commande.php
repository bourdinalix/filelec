<?php
    require_once("Controllers/Commande.php");
    $unController = new \Controllers\Commande();

    if(isset($_POST['ajouter']) && isset($_SESSION['email'])){
        //Insertion d'une nouvelle commande
        if(!isset($_SESSION['ref_commande'])){
            $dt = date("Y-m-d");
            $tab = array('code_client' => $_SESSION['code_client'], 'date_cmde' => $dt, 'etat' => 'en cours');
            $unController->insertCommandeProduits($tab);
    
            //Récuperer l'id de la commande et inserer le produit dans appartenir
            $tabSelectWhere = array('code_client' => $_SESSION['code_client'], 'date_cmde' => $dt);
            $uneCommande = $unController->selectWhereCommande($tabSelectWhere);
            $_SESSION['ref_commande'] = $uneCommande['ref_commande'];
        }
        require_once("gestion_appartenir.php");
    }


        