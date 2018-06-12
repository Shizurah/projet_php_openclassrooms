<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="public/images/favicon1.png" />
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link rel="stylesheet" href="public/css/style_management_space.css"/>
        <link rel="stylesheet" href="public/css/style_header.css"/>
        <title>Admin - Blog Jean Forteroche</title>
    </head>
            
    <body>
    
        <header>
            <?php
                require_once('nav.php');
            ?>

             <div class="header-management-space">
                <img src="public/images/connexion_form" alt="library">
            </div>
        </header>

        <section>
            <div id="success-msg">
                <?php
                    if ($_GET['action'] == 'updatedPost') {
                ?>
                        <p>
                            Votre <span> chapitre </span> a bien été modifié ! <br/>  
                        </p>

                        <a href="index.php?action=post&amp;postId=<?= $_GET['postId'] ?>">Voir le chapitre</a>
                <?php
                    } elseif ($_GET['action'] == 'addedPost') {  
                ?>   
                        <p>
                            Votre <span> chapitre </span> a bien été publié ! <br/>  
                        </p>

                        <a href="index.php?action=post&amp;postId=<?= $post->id() ?>">Voir le chapitre</a>
                <?php
                    }
                ?>
            </div>
        </section>

    </body>
</html>