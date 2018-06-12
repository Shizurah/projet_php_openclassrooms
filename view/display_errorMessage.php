<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="public/images/favicon1.png" />
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">  
        <link rel="stylesheet" href="public/css/style.css"/>
        <title>Erreur - Blog Jean Forteroche</title>
    </head>

    <body>

        <header>
            <?php
                require_once('nav.php');
            ?>
        </header>

        <section>
            <p id="error-msg">
                <img src="public/images/erreur.png" alt="alerte;">
                <span>Erreur : </span> 
                <?= $errorMsg ?>
            </p>
        </section>
    
    </body>

</html>