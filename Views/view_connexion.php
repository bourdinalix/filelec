<?php 
    require_once('view_layout_top.php'); 
?>

<div class="connexion">
    <div class="connexion-wrapper">

        <div class="connexion">
        
            <h2 class="connexion-title">Vous connecter</h2>

            <?php 
            
            if($result !== ""){
                echo "<div class='error-form'> $result </div>";
            }

            ?>

            <form class="connexion-form" action="" method="POST">
                <div class="form-element">
                    <label class="form-element-label" for="email">Email</label>
                    <input class="form-element-input" type="text" id="email" name="email" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="mdp">Mot de passe</label>
                    <input class="form-element-input" type="password" id="mdp" name="mdp" required>
                </div>

                <!-- <div class="form-element">
                    <p><a href="">Mot de passe oublié ?</a></p>
                </div> -->

                <div class="form-action">
                    <button class="send" name="connexion" type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once('view_layout_bottom.php'); ?>