<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        
        <?php
            if (isset($_GET['action']) && $_GET['action'] == 'postUpdating') {
        ?>
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
        
        <div id="success-msg" style="display: none">
            <?php
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            ?>
     
                <p>
                    Votre <span> chapitre </span> a bien été modifié ! <br/>  
                </p>

                <a href="index.php?action=post&amp;postId=<?= $_GET['postId'] ?>">Voir le chapitre</a>
        </div>
        <?php
            }
        ?>
        
        
        <form action="index.php?action=postUpdated" method="post">
            <label for="chapter-title">Titre</label><br/>
            <input  type="text" 
                    name="chapter-title" 
                    value="<?= $post->title() ?>"
                    id="chapter-title" 
                    required 
            />

            <br/><br/>

            <textarea name="chapter-content" id="chapter-textarea" rows="30" required>
                <?= $post->content(); ?>
            </textarea>

            <br/>
            
            <input type="submit" id="chapter-submit-btn" value="Publier" />
        </form>

        <script src="view/addPost.js"></script>




        <?php
            } else {
        ?>
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
            
            <div id="success-msg">
            <?php
                if (isset($_GET['lastPost'])) {
            ?>
                    
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
                <input  type="text" name="chapter-title" id="chapter-title" required />
                
                <br/><br/>

                <textarea name="chapter-content" id="chapter-textarea" rows="30" required>
                </textarea>

                <br/>
                
                <input type="submit" id="chapter-submit-btn" value="Publier" />
            </form>

            <script src="addPost.js"></script>
        <?php
            }
        ?>


        
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        
        <script>
            tinymce.init({
                selector: '#chapter-textarea',
                width: '1314',
            });
        </script>

         

    </body>

</html>