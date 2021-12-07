<?php require_once("view_layout_top.php"); ?>

<div class="admin-page">
    <div class="admin-page-wrapper">
        <h1 class="admin-page-title">Gestion des produits</h1>
        <a href="index.php?page=8&action=d&ref_produit='.'"></a>
        <div class="admin-page-products">
            <table>
                <thead>
                    <th>Référence</th>
                    <th>Unité</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody>
                    <?php foreach($produits as $produit): ?>
                        <tr>
                            <div class="products-element">
                                <td><?= $produit['ref_produit'] ?></td>
                                <td><?= $produit['numero_unite'] ?></td>
                                <td><?= $produit['nom'] ?></td>
                                <td><?= $produit['prix'] ?></td>
                                <td><?= $produit['quantite'] ?></td>
                                <td><a href='index.php?page=8&action=edit&ref_produit=<?= $produit['ref_produit'] ?>'>Modifier</a></td>
                                <td><a href='index.php?page=8&action=sup&ref_produit=<?= $produit['ref_produit'] ?>'>Supprimer</a></td>
                            </div>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





