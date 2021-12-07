<?php require_once('view_layout_top.php'); ?>

<div class="paiement">
    <div class="paiement-wrapper">   
            <h2 class="paiement-title">Paiement</h2>

            <form class="paiement-form" action="index.php?page=4" method="POST">

                <div class="form-element">
                    <label class="form-element-label" for="nomP">Nom*</label>
                    <input class="form-element-input" type="text" id="nomP" name="nomP" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label prenom" for="prenomP">Prénom*</label>
                    <input class="form-element-input" type="text" id="prenomP" name="prenomP"required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="numero">Numéro de carte*</label>
                    <input class="form-element-input form-paiement-num" type="text" id="numero" name="numero" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="date">Date d'expiration*</label>
                    <input class="form-element-input" type="date" id="date" name="mois" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="crypto">Cryptogramme*</label>
                    <input class="form-element-input" type="number" id="crypto" name="crypto" required>
                </div>

                <div class="form-action">
                    <button class="send" name="payer" type="submit">Payer</button>
                </div>
            </form>
        </div>
    </div>

<?php
    // require_once("Controllers/Commande.php");
    // $unController = new \Controllers\Commande();

    // if(isset($_POST['payer'])){
    //     $tab = array('ref_commande' => $_SESSION['ref_commande'], 'etat' => 'tata');
    //     $unController->updateEtat($tab);
    // }
    require_once('view_layout_bottom.php'); ?>