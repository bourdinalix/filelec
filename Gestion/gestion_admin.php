<?php
    require_once("Controllers/Produits.php");
    $unController = new \Controllers\Produits();

    $produits = $unController->selectAllProduits();
    require_once("Views/view_admin.php");

    if(isset($_GET['action']) && isset($_GET['ref_produit'])){
        $action = $_GET['action']; 
        $refProduit = $_GET['ref_produit'];
        $tab = array('ref_produit' => $refProduit); 
        $unProduit = null;

        switch ($action)
        {
            case "sup" : $unController->deleteProduit($tab); echo("<script>location.href = 'index.php?page=8';</script>");
            break;

            case "edit" : $unProduit = $unController->selectWhereProduit($refProduit);
            break; 
        }

        if (isset($_POST['modifier'])){
            $unite = htmlspecialchars($_POST['unite']);
            $nom = htmlspecialchars($_POST['nom']);
            $prix = htmlspecialchars($_POST['prix']);
            $qte = htmlspecialchars($_POST['qte']);
            $nbVente = 0;
            $img = htmlspecialchars($_POST['img']);
    
            $tab = array("ref_produit" => $refProduit, "numero_unite" => $unite, "nom" => $nom, "prix" => $prix, "quantite" => $qte, "img" => $img);
            $unController->updateProduit($tab);
            
            echo("<script>location.href = 'index.php?page=8';</script>");
        }
    }

    if(isset($_POST['add'])){
        $unite = htmlspecialchars($_POST['unite']);
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $qte = htmlspecialchars($_POST['qte']);
        $nbVente = 0;
        $img = htmlspecialchars($_POST['img']);

        $tabInsert = array('unite' => $unite, 'nom' => $nom, 'prix' => $prix, 'qte' => $qte, 'nb_vente' => $nbVente, 'img' => $img);
        $unController->insertProduit($tabInsert);

        echo("<script>location.href = 'index.php?page=8';</script>"); // Pour que la page "refraiche"
    }

    require_once("Views/view_admin_add_products.php");



    
