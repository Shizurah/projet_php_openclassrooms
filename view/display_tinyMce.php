<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link rel="stylesheet" href="public/css/style_management_space.css"/>
        <title>Mon blog</title>
    </head>
            
    <body>

        <div class="header-management-space">
            <img src="public/images/connexion_form" alt="library">
        
            <h2 id="tinyMce-page-title">
                MODIFIER UN CHAPITRE
            </h2>

            <a href="index.php?action=deconnexion" id="deconnexion-btn">Déconnexion</a>
        </div>

        <div id="redirections-btns">
            <a href="index.php?action=postsList" class="redirections-btns">Blog</a>
            <a href="index.php?action=connexion" class="redirections-btns">Tableau de bord</a>    
        </div>
        
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
        
        
        <?php
            if ($_GET['action'] == 'postWritting') {
        ?>
                <form action="index.php?action=addedPost" method="post">
        <?php 
            } elseif ($_GET['action'] == 'postUpdating') {
        ?>
                <form action="index.php?action=updatedPost&amp;postId=<?= $_GET['postId'] ?>" method="post">
        <?php
            }
        ?>


            <label for="chapter-title">Titre</label><br/>
            <input  type="text" 
                    name="chapter-title" 

                    <?php
                        if (isset($_GET['action']) && $_GET['action'] == 'postUpdating') {
                    ?>
                        value="<?= $post->title() ?>"
                    <?php
                        }
                    ?>

                    id="chapter-title" 
                    required 
            />

            <br/><br/>

            <textarea name="chapter-content" id="chapter-textarea" rows="30" required>
                <?php
                    if (isset($_GET['action']) && $_GET['action'] == 'postUpdating') {
                ?>
                        <?= $post->content(); ?>
                <?php
                    }
                ?>
            </textarea>

            <br/>
            
            <input type="submit" id="chapter-submit-btn" value="Publier" />
        </form>

        <script src="view/addPost.js"></script>
        
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        
        <script>
            tinymce.init({
                selector: '#chapter-textarea',
                width: '1314',
            });
        </script>

         

    </body>

</html>