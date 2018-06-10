<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">  
    <link rel="stylesheet" href="public/css/style.css"/>
    <title>Mon blog</title>
</head>

<body>

    <header>
            <nav>
                <a href="index.php">Blog</a>
                <a href="index.php?action=postsList&amp;page=1">Billet simple pour l'Alaska</a>

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
    </header>

    <section>
        <p id="error-msg">
            <img src="public/images/erreur.png" alt="alerte;">
            <span>Erreur : </span> 
            <?= $errorMsg ?>
        </p>
    </section>
    

</body>