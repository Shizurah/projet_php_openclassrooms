<!-- <?php
// session_start();
?> -->

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">  
        <link rel="stylesheet" href="public/css/style_management_space.css"/>
        <link rel="stylesheet" href="public/css/style_header.css"/>
        <!-- <link rel="stylesheet" href="public/css/style.css"/> -->
        <title>Document</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="index.php?action=blog">Blog</a>
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

            <div class="header-management-space">
                <img src="public/images/connexion_form" alt="library">
                <h2>BIENVENUE DANS VOTRE ESPACE D'ADMINISTRATION</h2>
            </div>      
        </header>
        



        <h3>AJOUTER UN CHAPITRE</h3>

        <a href="index.php?action=postWritting" id="writting-btn"><img src="public/images/pencil.png" alt="crayon"/>Rédiger un chapitre</a>
        
        
        <h3>GÉRER VOS CHAPITRES PUBLIÉS</h3>

        <div id="success-msg">
            <?php
                if ($_GET['action'] == "postDeleting") {
            ?>
                    <p>
                        Votre <span> chapitre </span> a été supprimé avec succès !   
                    </p>
            <?php
                } 
            ?>
        </div>

        <table>

            <tr>
                <th>Chapitres</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
        
        <?php
            foreach($posts as $post) {
        ?>
                <tr>
                    <td><?= $post->title() ?></td>
                    
                    <td><?= $post->postDateFr() ?></td>

                    <td>
                        <div class="actions-btns">
                            <a href="index.php?action=postUpdating&amp;postId=<?= $post->id() ?>" id="updating-btn"> <img src="public/images/gomme.png" alt="gomme"/> Modifier </a>  
                            <a href="index.php?action=postDeleting&amp;postId=<?= $post->id() ?>" id="deleting-btn"> <img src="public/images/poubelle.png" alt="poubelle"/> Supprimer </a> 
                        </div>
                    </td>
                    
                </tr>
        <?php
            }
        ?>
        </table>
        
        <h3>MODÉRER LES COMMENTAIRES</h3>

        <table>

            <tr>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Date de publication</th>
                <th>Signalé</th>
                <th>Actions</th>
            </tr>
            
        <?php
            foreach($reportedComments as $reportedComment) {
        ?>
                <tr>
                    <td><?= $reportedComment->author() ?></td>
                    <td><?= $reportedComment->content() ?></td>
                    <td><?= $reportedComment->commentDateFr() ?></td> 
                    <td><?= $reportedComment->reportings() ?> fois</td>
                    <td>
                        <a href="index.php?action=post&amp;postId=<?= $reportedComment->postId() ?>" id="chapter-reference-btn">Voir chapitre correspondant</a><br/>
                        <a href="index.php?action=deleteComment&amp;commentId=<?= $reportedComment->id() ?>" id="deleting-comment-link">Supprimer</a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br/><br/>

        <script src="view/posts_and_comments_management.js"></script>
    </body>
</html>