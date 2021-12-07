<?php require_once("view_layout_top.php"); ?>

<div class="products">
    <div class="products-wrapper">
        <h1 class="products-title">Liste de nos produits</h1>
        <div class="products-container">
            <?php foreach($produits as $produit): ?>
                <div class="products-element">
                    <div class="products-img">
                        <div class="products-img-wrapper">
                            <img src="<?= $produit['img'] ?>" alt="">
                        </div>
                    </div>
                    <h2>Référence produit : <?= $produit['ref_produit'] ?></h2>
                    <p>Nom produit : <?= $produit['nom'] ?></p>
                    <p>Prix produit : <?= $produit['prix'] ?></p>
                    <p>Quantité du produit : <?= $produit['quantite'] ?></p>
                    <form action="" method="post">
                        <input type="hidden" name="ref_produit" value=<?= $produit['ref_produit'] ?>>
                        <input type="submit" name="ajouter" value="Ajouter au panier">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once("view_layout_bottom.php"); ?>