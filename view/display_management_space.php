<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="public/images/favicon1.png" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">  
        <link rel="stylesheet" href="public/css/style_management_space.css"/>
        <link rel="stylesheet" href="public/css/style_header.css"/>
        <!-- <link rel="stylesheet" href="public/css/style.css"/> -->
        <title>Admin - Blog Jean Forteroche</title>
    </head>

    <body>

        <header>
            <?php
                require_once('nav.php');
            ?>

            <div class="header-management-space">
                <img src="public/images/connexion_form" alt="library">
                <h2>BIENVENUE DANS VOTRE ESPACE D'ADMINISTRATION</h2>
            </div>      
        </header>
        
        <section>
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

            <div id="success-msg-for-deleting-comment">
                <?php
                    if ($_GET['action'] == "deleteComment") {
                ?>
                        <p>
                            Le <span> commentaire </span> a été supprimé avec succès !   
                        </p>
                <?php
                    } 
                ?>
            </div>

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
                                <a href="index.php?action=deleteComment&amp;commentId=<?= $reportedComment->id() ?>#success-msg-for-deleting-comment" id="deleting-comment-link">Supprimer</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </table>
            <br/><br/>
        </section>
        
        <script src="js/posts_and_comments_management.js"></script>
    </body>
</html>