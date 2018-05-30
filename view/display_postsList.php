<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet"> 
    <link rel="stylesheet" href="public/css/style.css"/>
    <title>Mon blog</title>
</head>

<body>

<?php
require_once('header.php');
?>
    
    <section>
        
        <div id="chapters-container">
            <h2 id="book-title">Billet simple pour l'Alaska</h2>

            <?php
            foreach($posts as $post) {
            ?>

            <div class="posts">
                <h4>
                    <?= $post->title() ?>
                </h4>
                <p>
                    <?= $post->content() ?>

                    <br/><br/>

                    <em>Publié le <?= $post->postDateFr() ?></em> - <a href="index.php?action=post&amp;postId=<?= $post->id() ?>">Commentaires</a>
                </p>
            </div>

            <?php
            }
            ?>
        </div>

        <?php
        require_once('aside.php');
        ?>
    </section>

</body>
</html>