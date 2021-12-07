<?php require_once("view_layout_top.php"); ?>

<div class="account">
    <div class="account-wrapper">
        <div class="account-container">
            <div class="account-list">
                <h2 class="account-list-title">Mes dernieres commandes</h2>
                <?php foreach($ordersPay as $orderPay): ?>
                    <div class="account-order-pay-element">
                        <img class="account-order-pay-img" src="<?= $orderPay['img'] ?>" alt="">
                        <p><?= $orderPay['nom'] ?></p>
                        <p><?= $orderPay['quantite_commander'] ?></p>
                        <p><?= $orderPay['prix'] ?></p>
                        <p><?= $orderPay['prix_total'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="account-infos">
                <h2 class="account-infos-title">Mes informations</h2>
                <div class="account-infos-element">
                    <?php foreach($accounts as $account): ?>
                        <p>Code client : <?= $account['code_client']?></p>
                        <p>Nom : <?= $account['nom']?></p>
                        <p>Nom ville : <?= $account['nom_ville']?></p>
                        <p>Adresse : <?= $account['adresse']?></p>
                        <p>Email : <?= $account['email']?></p>
                        <p>Telephone : <?= $account['telephone']?></p>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once("view_layout_bottom.php"); ?>