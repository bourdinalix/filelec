<?php require_once('view_layout_top.php'); ?>

<div class="inscription">
    <div class="inscription-wrapper">   
            <h2 class="inscription-title">Vous inscrire</h2>

            <?php 

            if($error !== ""){
                echo "<div class='error-form'> $error</div>";
            }

            if($success !== ""){
                echo "<div class='success-form'> $success </div>";
            }

            ?>

            <form class="inscription-form" action="" method="POST">

                <div class="form-checkbox">
                    <input type="checkbox" class="type_client" name="type_client" id="type_client">
                    <label for="type_client">Entreprise</label>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="nom">Nom*</label>
                    <input class="form-element-input" type="text" id="nom" name="nom" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label prenom" for="prenom" >Prénom*</label>
                    <input class="form-element-input" type="text" id="prenom" name="prenom"required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="ville">Nom de la ville*</label>
                    <input class="form-element-input" type="text" id="ville" name="nom_ville" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="adresse">Adresse*</label>
                    <input class="form-element-input" type="text" id="adresse" name="adresse" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="tel">Téléphone*</label>
                    <input class="form-element-input" type="text" id="tel" name="telephone" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="email">Email*</label>
                    <input class="form-element-input" type="email" id="email" name="email" require>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="mdp">Mot de passe*</label>
                    <input class="form-element-input" type="password" id="mdp" name="mdp" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="confirm_mdp">Confirmation du mot de passe*</label>
                    <input class="form-element-input" type="password" id="confirm_mdp" name="confirm_mdp" required>
                </div>

                <div class="form-action">
                    <button class="send" name="inscription" type="submit">Inscription</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once('view_layout_bottom.php'); ?>