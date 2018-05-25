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
        <div class="posts">
            <h3><?= $post->title() ?></h3>
            <p><?= $post->content() ?></p>
            <em>Publié le <?= $post->postDateFr() ?></em>
        </div>
    

        <br/><br/><br/>

        <!-- <h4>Ajouter un commentaire</h4> -->

        <h4 id="comments-title">Commentaires</h4>
        <button id="writing-comment-btn">Ajouter un commentaire</button>

        <form action="" method="post" id="comment-form">
            <label for="pseudo">Pseudo</label><br/>
            <input type="text" name="pseudoComment" id="pseudo"> <br/>

            <label for="comment">Commentaire</label><br/>
            <textarea name="comment" id="comment" cols="50" rows="6"></textarea><br/>

            <input type="submit" value="Envoyer votre commentaire" id="sending-comment-btn">
            <br/><br/>
        </form>

        <?php
        foreach ($comments as $comment) {
        ?>
        <!-- <div class="comments"> -->
            <p class="comments">
                <strong><?= $comment->author() ?></strong>, le <?= $comment->commentDateFr() ?><br/>
                <?= $comment->content() ?>

                <br/><br/>

                <a href="#">Signaler le commentaire</a>
            </p>
        <!-- </div> -->

        <?php
        }
        ?>
    </div>
    

    <script src="view/comments.js"></script>
</body>
</html>