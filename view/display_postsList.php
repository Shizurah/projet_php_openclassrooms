<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">  
        <link rel="stylesheet" href="public/css/style.css"/>
        <title>Mon blog</title>
    </head>

    <body>

    <?php
    // require_once('header.php');
    ?>

    <header>
        <nav>
            <a href="index.php">Blog</a>
            <a href="index.php?action=postsList&amp;page=1">Billet simple pour l'Alaska</a>

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
        </div>
    </header>

    <section id="chapters-container">
        
        <!-- <div id="">
            <p id="blog-intro">
                Bonjour et bienvenue sur mon blog.<br/><br/>
                Je commence ici l'écriture de mon nouveau roman, <strong>"Billet simple pour l'Alaska"</strong>.<br/><br/>
                C'est la première fois que je décide de publier un livre en ligne, et j'espère que 
                l'expérience vous plaira autant qu'à moi. Bien sûr j'espère aussi que mon roman 
                saura combler vos attentes. Je prévois sa publication au rythme d'un chapitre 
                par semaine, alors n'hésitez pas à surveiller les nouvelles publications.
                Un espace membre est actuellement en construction, et vous pourrez alors 
                vous inscrire à la newsletter, de sorte d'être averti(e) dès la parution d'un nouvel épisode.
                N'hésitez pas à laisser vos commentaires, et si vos retours sont favorables, j'ai d'ores et déjà 
                une idée pour mon prochain roman.
                <br/><br/>
                Je vous souhaite bonne aventure, et bien sûr bonne lecture.
            </p>

            <div id="book-cover">  
                <h2 id="book-title">Billet simple pour l'Alaska</h2>
                <a href=""><img src="public/images/nature.jpg" alt="Page de couverture du roman: loup"></a>
            </div>

            <p id="info">Cliquez sur la couverture pour accéder à la lecture du roman</p> -->
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

        
            
        

        <!-- <aside>
            <div class="aside-titles">
                <h3>CHAPITRES</h3>
            </div>
            
                
            <?php
                foreach($posts as $post) {
            ?>
            
                    <a href="index.php?action=post&amp;postId=<?= $post->id() ?>" class="chapters-list"><?= $post->title() ?></a><br/>

            <?php
                }
            ?> 
        </aside> -->

        <?php
        // require_once('aside.php');
        ?> 
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
