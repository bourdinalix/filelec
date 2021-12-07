<header class="header">
    <div class="header-wrapper">

        <div class="header-logo-search">
            <div class="header-logo">
                <h1><a href="index.php?page=0"><img src="public/img/filelec.PNG" alt=""></a></h1>
            </div>

            <!-- <div class="header-search">
                <input type="search" aria-label="Cherchez votre pièce ou accessoires auto" placeholder="Cherchez vos pièces ou accessoires auto..."> 
            </div> -->
        </div>

        <nav class="header-nav">
            <ul class="header-nav-elements">
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=1">Produits</a></li>
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=2">Mon compte</a></li>
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=3">Inscription</a></li>
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=4">Mon panier</a></li>
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=5">Contact</a></li>
                <li class="header-nav-data"><a class="header-nav-link" href="index.php?page=6"><?php if(isset($_SESSION['email']) || isset($_SESSION['username'])) {echo "Déconnexion";} ?></a></li>
            </ul>
        </nav>
    </div>
</header>