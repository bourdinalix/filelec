<?php
    require_once("Controllers/Panier.php");
    $unController = new \Controllers\Panier();

    require_once("Controllers/Commande.php");
    $uneCommande = new \Controllers\Commande();

    $error = null;

    $tabEtat = array('ref_commande' => $_SESSION['ref_commande']);
    
    $etat = $uneCommande->getEtat($tabEtat);

    if(isset($_SESSION['email']) && isset($_SESSION['ref_commande'])){  

        $dt = date("Y-m-d");
        $tab = array('ref_commande' => $_SESSION['ref_commande'], 'date_cmde' => $dt);
        $unPanier = $unController->selectPanier($tab);
        $unTotalPanier = $unController->selectTotalPanier($tab);

        if(isset($_POST['modifier_qte'])){
            if($_POST['quantite_commander'] >= 3){
                $refProduit = $_POST['ref_produit_panier'];
                $tabUpdate = array("quantite_commander" => $_POST['quantite_commander'], "ref_commande" => $_SESSION['ref_commande'], "ref_produit" => $refProduit);
                $unController->updatePanier($tabUpdate);
                echo("<script>location.href = 'index.php?page=4';</script>");
            }else{
                $error = "La quantité demandé est trop petite (min 3)";
            }
            
        }

        if(isset($_POST['supp_pdt'])){
            $refProduit = $_POST['ref_produit_panier'];
            var_dump($refProduit);
            $tabDelete = array("ref_commande" => $_SESSION['ref_commande'], "ref_produit" => $refProduit);
            $unController->deleteProduitPanier($tabDelete);   
            echo("<script>location.href = 'index.php?page=4';</script>");
        }

        require_once("Views/view_panier.php");
        
    }else if(!isset($_SESSION['email'])){
        header("Location: index.php?page=2");
    }else if(isset($_SESSION['email']) && (!isset($_SESSION['ref_commande']) || $etat == "payer")){
        require_once("Controllers/Produits.php");
        $unController = new \Controllers\Produits();
        $produits = $unController->selectTopVentes();
        require_once("Views/view_top_ventes.php");
    }



    require_once("gestion_paiement.php");



