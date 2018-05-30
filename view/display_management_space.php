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
        <title>Document</title>
    </head>

    <body>
        <div id="header-management-space">
            <img src="public/images/connexion_form" alt="library">
            <!-- <p>Bonjour 
                $user->pseudo(); 
            !</p> -->
            <h2>
                BIENVENUE DANS VOTRE ESPACE D'ADMINISTRATION
            </h2>

            <a href="index.php?action=deconnexion" id="deconnexion-btn">Déconnexion</a>
        </div>

        <h3>AJOUTER UN CHAPITRE</h3>
        <button id="writting-btn"><img src="public/images/pencil.png" alt="crayon"/>Rédiger un chapitre</button>
        <h3>GÉRER VOS CHAPITRES PUBLIÉS</h3>

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
                            <button id="updating-btn"><img src="public/images/gomme.png" alt="gomme"/>Modifier</button> 
                            <button id="deleting-btn"><img src="public/images/poubelle.png" alt="poubelle"/>Supprimer</button>
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
                        <a href="index.php?action=post&amp;postId=<?= $reportedComment->postId() ?>">Voir chapitre correspondant</a><br/>
                        <a href="index.php?action=delete&amp;commentId=<?= $reportedComment->id() ?>">Supprimer</a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br/><br/>
    </body>
</html>