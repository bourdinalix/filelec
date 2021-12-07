<?php require_once("view_layout_top.php"); ?>

<div class="top-sell">
    <div class="top-sell-wrapper">
        <h2 class="top-sell-title">Votre panier est vide !</h2>
        <h3 class="top-sell-title">Petit apercu des produits les plus vendus de notre site</h3>
            <div class="top-sell-container">
                <?php foreach($produits as $produit): ?>
                    <div class="top-sell-element">
                        <div class="products-img">
                            <div class="products-img-wrapper">
                                <img src="<?= $produit['img'] ?>" alt="">
                            </div>
                        </div>
                        <h2>Référence produit : <?= $produit['ref_produit'] ?></h2>
                        <p>Nom produit : <?= $produit['nom'] ?></p>
                        <p>Prix produit : <?= $produit['prix'] ?></p>
                        <p>Nombre vendus : <?= $produit['nb_vente'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>

<?php require_once("view_layout_bottom.php"); ?>