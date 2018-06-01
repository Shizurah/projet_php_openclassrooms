<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">  
        <link rel="stylesheet" href="../public/css/style_management_space.css"/>
        <title>Mon blog</title>
    </head>

    <body>

        <div class="header-management-space">
            <img src="../public/images/connexion_form" alt="library">
        
            <h2 id="tinyMce-page-title">
                RÉDIGER UN CHAPITRE
            </h2>

            <a href="../index.php?action=deconnexion" id="deconnexion-btn">Déconnexion</a>
        </div>

        <br/>

        <a href="../index.php?action=connexion" id="mySpace">Tableau de bord</a>
        <br/>
        <a href="" id="back">Retour page d'accueil</a>

        <br/>

        <!-- <div > -->
            <p id="success-msg">
                Votre <span> chapitre </span> a bien été publié ! <br/>
                <a href="">>> Voir le chapitre</a>  
            </p>
        <!-- </div> -->

        <form action="" action="post">
            <label for="chapter-title">Titre</label><br/>
            <input type="text" name="chapter-title" id="chapter-title" required><br/><br/>

            <textarea name="chapter-textarea" id="chapter-textarea" rows="30" required></textarea>

            <br/>
            
            <input type="submit" id="chapter-submit-btn" value="Publier">
        </form>

        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

        <script>
            tinymce.init({
                selector: '#chapter-textarea'
            });
        </script>

    </body>

</html>