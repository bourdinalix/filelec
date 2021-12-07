<div class="add-products">
    <div class="add-products-wrapper">
        <h2 class="add-products-title">Ajouter ou modifier un nouveau produit</h2>
        <div class="add-products-form">
            <form action="" method="POST">
                <div class="form-element">
                    <?php if (isset($unProduit) != null) echo 'Référence produit : ' . $unProduit['ref_produit']; else echo '';?>
                </div>
                
                <div class="form-element">
                    <label class="form-element-label" for="">Numéro Unité</label>
                    <input class="form-element-input" type="text" id="" name="unite" value="<?= (isset($unProduit) != null) ? $unProduit['numero_unite'] : ''; ?>">
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="">Nom</label>
                    <input class="form-element-input" type="text" id="" name="nom" value="<?= (isset($unProduit) != null) ? $unProduit['nom'] : ''; ?>">
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="">Prix</label>
                    <input class="form-element-input" type="text" id="" name="prix" value="<?= (isset($unProduit) != null) ? $unProduit['prix'] : ''; ?>">
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="">Stock</label>
                    <input class="form-element-input" type="text" id="" name="qte" value="<?= (isset($unProduit) != null) ? $unProduit['quantite'] : ''; ?>">
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="">Image</label>
                    <input class="form-element-input" type="text" id="" name="img" value="<?= (isset($unProduit) != null) ? $unProduit['img'] : ''; ?>"></input>
                </div>

                <div class="form-action">
                    <?php if (isset($unProduit) == null) echo '<input class="send" type="submit" name="add" value="Ajouter">'; else echo '<input class="send" type="submit" name="modifier" value="Modifier">';?>
                </div>
                <input type="hidden" name="ref_produit" value="<?php echo ($unProduit != null) ? $unProduit['ref_produit'] : ''; ?>">
            </form>
        </div>
    </div>
</div>

<?php require_once("view_layout_bottom.php"); ?>

