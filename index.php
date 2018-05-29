<?php
// INDEX.PHP = ROUTEUR

require_once('controller.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'postsList') {
        listPosts();
    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            post($_GET['postId']);
        }    
    } 
    
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['pseudoComment']) && isset($_POST['comment']) && isset($_GET['postId']) && $_GET['postId'] > 0) {
            addComment($_GET['postId'], $_POST['pseudoComment'], $_POST['comment']);

            header('Location: index.php?action=post&postId=' .$_GET['postId']);
            exit;
        }
    }

    elseif ($_GET['action'] == 'connexion') {
        if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
            if ($_POST['pseudo'] == 'Jean' && $_POST['mdp'] == '45F!nb0H') {
                managementSpace($_POST['pseudo'], $_POST['mdp']);
            } else {
                header('Location: view/connexion.php');
            }
        }
    }
}

else {
    listPosts();
}

