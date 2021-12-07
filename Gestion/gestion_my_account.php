<?php
    require_once("Controllers/Account.php");
    $unController = new \Controllers\Account();
    require_once("Controllers/Commande.php");
    $uneCommande = new \Controllers\Commande();

    $etat = '';

    if(isset($_SESSION['email'])){
        $accounts = $unController->selectMyAccount($_SESSION);
    }

    if(isset($_SESSION['ref_commande'])){
        $tabEtat = array('ref_commande' => $_SESSION['ref_commande']);
        $etat = $uneCommande->getEtat($tabEtat);
    }
    
    $tabOrderPay = array('code_client' => $_SESSION['code_client']);
    $ordersPay = $unController->selectOrderPay($tabOrderPay);

    
    require_once("Views/view_my_account.php");  