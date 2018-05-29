<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style_connexion.css"/>
</head>

<body>
    <!-- <p>
        Se connecter à l'espace d'administration
    </p> -->
    <div id="img-background">
        <img src="../public/images/connexion_form.png" alt="library">

        <div id="background">
            <form action="" method="post">
                <label for="pseudo">Pseudo </label>
                <label for="mdp" id="label-id">Mot de passe </label><br/>

                <input type="text" name="pseudo" id="pseudo" size="30" maxlength="50">
                <input type="password" name="mdp" id="mdp" size="30" maxlength="50">
                <input type="submit" value="Connexion" id="connexion">
            </form>

            <p>
                Seul l'administrateur du site est actuellement autorisé à se connecter
            </p>
        </div>

    </div>
    
    
</body>
</html>