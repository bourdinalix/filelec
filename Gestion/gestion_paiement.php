<?php
require_once("Controllers/Commande.php");
$uneCommande = new \Controllers\Commande();

if(isset($_POST['commander'])){
    echo("<script>location.href = 'index.php?page=7';</script>");
}

if(isset($_POST['payer'])){
    $tab = array('ref_commande' => $_SESSION['ref_commande'], 'etat' => 'payer');
    $uneCommande->updateEtat($tab);
    
    $_SESSION['ref_commande'] = null;
    echo("<script>location.href = 'index.php?page=0';</script>");
}