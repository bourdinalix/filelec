<?php
    require_once("Controllers/Produits.php");
    $unController = new \Controllers\Produits();

    $produits = $unController->selectAllProduits();
    require_once("Views/view_produits.php");

    if(isset($_POST['ajouter']) && isset($_SESSION['email'])){
        $refProduit = $_POST['ref_produit'];
        $_SESSION['ref_produit'] = $refProduit;
        require_once("gestion_commande.php");
    }