<?php
    require_once("Controllers/Appartenir.php");
    $unController = new \Controllers\Appartenir();

    $tabInsert = array('ref_produit' => $_SESSION['ref_produit'], 'ref_commande' => $_SESSION['ref_commande'], 'quantite_commander' => 3);
    $unController->insertAppartenirProduits($tabInsert);