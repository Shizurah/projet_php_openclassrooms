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
            
                <?php
                    if ($_GET['action'] == 'postWritting') {
                ?>
                        <h2 id="tinyMce-page-title">RÉDIGER UN CHAPITRE</h2>
                <?php 
                    } elseif ($_GET['action'] == 'postUpdating') {
                ?>
                        <h2 id="tinyMce-page-title">MODIFIER UN CHAPITRE</h2>   
                <?php
                    }
                ?>
            </div>
        </header>
          
        <section>
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
        </section>
        
        <script src="js/addPost.js"></script>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '#chapter-textarea',
                width: '1314',
            });
        </script>

    </body>

</html>