<nav>
    <a href="index.php">Blog</a>
    <a href="index.php?action=postsList&amp;page=1">Roman</a>

    <?php
        if(!isset($_SESSION['pseudo'])) {
    ?>
            <a href="index.php?action=connexionPage" id="connexion-btn">Connexion</a>
            
            
    <?php
        } else {
    ?>
            <a href="index.php?action=mySpace">Mon espace</a>
            <a href="index.php?action=deconnexion" id="connexion-btn">Déconnexion</a>
    <?php
        }
    ?>
</nav>