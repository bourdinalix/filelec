<?php
    session_start();
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 0;
    }

    switch($page){
        case 0: require_once("Views/view_home_page.php");
                break;
        case 1: require_once("Gestion/gestion_produits.php");
                break;
        case 2: if(isset($_SESSION['email'])){
                require_once("Gestion/gestion_my_account.php");
        }else{
                require_once("Gestion/gestion_connexion.php");   
        }
        if(isset($_SESSION['username'])){
                echo("<script>location.href = 'index.php?page=8';</script>");
        }
                break;
        case 3: if(isset($_SESSION['email'])){
                require_once("Gestion/gestion_my_account.php");
        }else{
                require_once("Gestion/gestion_inscription.php");   
        }
                break;
        case 4: require_once("Gestion/gestion_panier.php");
                break;
        case 5: require_once("Gestion/gestion_contact.php");
                break;
        case 6: session_destroy();
                require_once("Views/view_home_page.php");
                break;
        case 7: require_once("Views/view_paiement.php"); break;
        case 8: if(isset($_SESSION['username'])){
                require_once("Gestion/gestion_admin.php");
        }else{
                require_once("Views/view_home_page.php");
        }; 
        break;
        case 9: require_once("Gestion/gestion_histogramme.php"); break;
    }
    