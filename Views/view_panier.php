<?php require_once("view_layout_top.php"); ?>

<div class="panier">
    <div class="panier-wrapper">
        <h1 class="panier-title">Mon panier</h1>

        <?php 

            if($error !== null){
                echo "<div class='error-form'> $error</div>";
            }

        ?>

        <div class="panier-container">
            <?php foreach($unPanier as $panier): ?>
                <div class="panier-element">
                    <img class="panier-img" src="<?= $panier['img'] ?>" alt="">
                    <p><?= $panier['nom'] ?></p>
                    <form action="" method="POST">
                        <p><input type="text" name="quantite_commander" id="quantite_commander" value="<?= $panier['quantite_commander'] ?>"></p>
                        <input type="hidden" name="ref_produit_panier" value=<?= $panier['ref_produit'] ?>>
                        <p><input type="submit" name="modifier_qte" value="Modifier la quantité"></p>
                        <p><input type="submit" name="supp_pdt" value="Supprimer le produit"></p>
                    </form>
                    <p><?= $panier['prix'] ?></p>
                    <p><?= $panier['prix_total'] ?> </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="">
            <?php foreach($unTotalPanier as $panier): ?>
                <div class="">
                    <p>Prix Total : <?= $panier['total'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="panier-form">
            <form action="" method="POST">
                <input class="panier-send" type="submit" name="commander" value="Commander">
            </form>
        </div>
    </div>
</div>

    <?php require_once("view_layout_bottom.php"); ?>