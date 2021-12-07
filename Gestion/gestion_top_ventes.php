<?php
    require_once("Controllers/Produits.php");
    $unController = new \Controllers\Produits();

    $produits = $unController->selectTopVentes();
    require_once("Views/view_top_ventes.php");
