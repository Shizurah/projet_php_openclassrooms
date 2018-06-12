<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="public/css/style.css"/>
        <title>Document</title>
    </head>

    <body>

        <div id="main-wrapper-for-one-post">

            <header>
                <nav>
                    <a href="index.php?action=blog">Blog</a>
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

                <!-- <img src="public/images/nature1.png" alt="library"/> -->
            </header>
            

            <div id="container-for-one-post" class="posts">

                <h3 id="post-title"><?= $post->title() ?></h3>

                <div id="post-content">
                    <?= $post->content() ?>
                </div>

                <em>Publié le <?= $post->postDateFr() ?></em> - <a href="index.php" class="links-beside-date">Retour au blog</a>

                <br/>

                <button id="writting-comment-btn">Commenter</button>


                <form action="index.php?action=addComment&amp;postId=<?= $post->id() ?>" method="post" id="comment-form">

                    <label for="pseudo">Pseudo</label><br/>
                    <input type="text" name="pseudoComment" id="pseudo" required> <br/>

                    <label for="comment">Commentaire</label><br/>
                    <textarea name="comment" id="comment" cols="50" rows="6" required></textarea><br/>

                    <input type="submit" value="Envoyer" id="sending-comment-btn">
                    <br/><br/>

                </form>

            </div>

            <h4 id="comments-title">Commentaires</h4>
        
            <?php
            foreach ($comments as $comment) {
            ?>
                <p class="comments">
                    <strong><?= $comment->author() ?></strong>, le <?= $comment->commentDateFr() ?> - <a href="index.php?action=reportComment&amp;commentId=<?= $comment->id() ?>&amp;postId=<?= $post->id() ?>" class="links-beside-date reporting-comment-links">Signaler</a> <br/> 
                    <?= $comment->content() ?>

                    <br/>
                </p>
            <?php
            }
            ?>
            
            <br/>

        </div>

        <script src="js/add_and_report_comment.js"></script>
    </body>
</html>