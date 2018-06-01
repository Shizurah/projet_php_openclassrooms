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

        <div id="redirections-btns">
            <a href="../index.php?action=postsList" class="redirections-btns">Blog</a>
            <a href="../index.php?action=connexion" class="redirections-btns">Tableau de bord</a>    
        </div>
        
        <?php
            if (isset($_GET['lastPost'])) {
        ?>
                <div id="success-msg">
                    <p>
                        Votre <span> chapitre </span> a bien été publié ! <br/>  
                    </p>

                    <a href="../index.php?action=post&amp;postId=<?= $_GET['lastPost'] ?>">Voir le chapitre</a>
                </div>
        <?php
            }
        ?>
        
        <form action="../index.php?action=addPost" method="post">
            <label for="chapter-title">Titre</label><br/>
            <input type="text" name="chapter-title" id="chapter-title" required /><br/><br/>

            <textarea name="chapter-content" id="chapter-textarea" rows="30" required></textarea>

            <br/>
            
            <input type="submit" id="chapter-submit-btn" value="Publier" />
        </form>


        
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        
        <script>
            tinymce.init({
                selector: '#chapter-textarea'
            });
        </script>

        <script src="actions.js"></script> 

    </body>

</html>