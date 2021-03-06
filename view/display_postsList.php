<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="public/images/favicon1.png" />
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">  
        <link rel="stylesheet" href="public/css/style.css"/>
        <title>Roman - Blog Jean Forteroche</title>
    </head>

    <body>
        <header>
            <?php
                require_once('nav.php');
            ?>

            <div>
                <?php
                    if ($_GET['page'] == 1) {
                ?>
                        <div id="reading-book-cover">
                            <h2>Billet simple pour l'Alaska</h2>
                            <img src="public/images/nature.jpg" alt="library"/>
                        </div> 
                <?php
                    }
                ?>

                <p id="pagination">
                    Page :
                    <?php
                    $i;
                        for ($i = 1; $i <= $nbPages; $i++) {
                    ?>
                            <a href="index.php?action=postsList&amp;page=<?= $i ?>"><?= $i ?></a>
                    <?php
                        }
                    ?>   
                </p>
            </div>   
        </header>

        <section id="chapters-container">
            <div>
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
                                <em>Publié le <?= $post->postDateFr() ?></em> - <a href="index.php?action=post&amp;postId=<?= $post->id() ?>" class="links-beside-date">Commentaires</a>
                            </p>
                        </div>
                <?php
                    }
                ?>
            </div>        
        </section>

        <footer>
            Page :
            <?php
                $i;
                for ($i = 1; $i <= $nbPages; $i++) {
            ?>
                    <a href="index.php?action=postsList&amp;page=<?= $i ?>"><?= $i ?></a>
            <?php
                }
            ?>   
        </footer>
    </body>
</html>
