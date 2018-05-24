<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/style.css"/>
    <title>Mon blog</title>
</head>

<body>

<?php
require_once('header.php');
?>

    <section>
        <?php
        while ($data = $req->fetch()) {
            $post = new Post($data);
        ?>

        <div class="posts">
            <h4>
                <?= $post->title() ?>
            </h4>
            <p>
                <?= $post->content() ?>

                <br/><br/>

                <em>Publié le <?= $post->postDateFr() ?></em> - <a href="view/display_post_and_comments.php?postId=<?= $post->id() ?>">Voir les commentaires</a>
            </p>
            <hr/>
        </div>

        <?php
        }
        $req->closeCursor();
        ?>
        <!-- <aside></aside> 
        Balise aside pour afficher une liste déroulante contenant chaque chapitre, du + récent au plus ancien, de sorte à pouvoir cliquer et se rendre directement sur un chapitre ? -->
    </section>

</body>
</html>