<?php include 'view_layout_top.php'; ?>

<div class="contact">
    <div class="contact-wrapper">
            <h2 class="contact-title">Nous contacter</h2>

            <?php 

                if($error !== ""){
                    echo "<div class='error-form'> $error</div>";
                }

                if($success !== ""){
                    echo "<div class='success-form'> $success </div>";
                }

            ?>

            <form class="contact-form" action="" method="POST">
                <div class="form-element">
                    <label class="form-element-label" for="contact-form-email">Email*</label>
                    <input class="form-element-input" type="email" id="contact-form-email" name="email" required> 
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="contact-form-nom">Nom*</label>
                    <input class="form-element-input" type="text" id="contact-form-nom" name="nom" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="contact-form-prenom">Prénom*</label>
                    <input class="form-element-input" type="text" id="contact-form-prenom" name="prenom" required>
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="contact-form-entreprise">Entreprise (si pas d'entreprise ne rien mettre)</label>
                    <input class="form-element-input" type="text" id="contact-form-entreprise" name="entreprise">
                </div>

                <div class="form-element">
                    <label class="form-element-label" for="contact-form-msg">Message*</label>
                    <textarea class="form-element-textarea" type="text" id="contact-form-msg" name="message" required></textarea>
                </div>

                <div class="form-action">
                    <button class="send" type="submit" name="envoyer-contact">Envoyer</button>
                </div>
            </form>
        </div>
</div>


<?php include 'view_layout_bottom.php'; ?>