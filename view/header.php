<?php
    // if (!isset($_SESSION)) {
    //     session_start();
    // }
?> 



<nav>
    <a href="index.php">Blog</a>
    <a href="index.php?action=postsList">Billet simple pour l'Alaska</a>

    <?php
        if(!isset($_SESSION)) {
    ?>
            <a href="view/connexion.php" id="connexion-btn">Connexion</a>
            
            
    <?php
        } else {
    ?>
            <a href="index.php?action=connexion">Mon espace</a>
            <a href="index.php?action=deconnexion" id="connexion-btn">Déconnexion</a>
    <?php
        }
    ?>
</nav>

    
<header>
    <div>
        <img src="public/images/library2.png" alt="library"/>
        <div id="titles">
            <h1>Blog de Jean Forteroche</h1>
            <h2>Ecrivain contemporain et romancier</h2>
        </div>
    </div>
</header>














