<?php
// session_start();
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
                if (!isset($_SESSION)) {
                    session_start();
                }
            
                managementSpace();

            } else {
                header('Location: view/connexion.php');
            }
        }

        elseif (isset($_SESSION)) {
            managementSpace();
        }
    }

    elseif ($_GET['action'] == 'addPost') {
        if (isset($_POST['chapter-title']) && isset($_POST['chapter-content'])) {
            addPost($_POST['chapter-title'], $_POST['chapter-content']);  
        }
    }

    elseif ($_GET['action'] == 'postUpdating') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            postForUpdating($_GET['postId']);
        }
    }

    elseif ($_GET['action'] == 'postDeleting') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            deletePost($_GET['postId']);
        }
    }

    elseif($_GET['action'] == 'reportComment') {
        if (isset($_GET['commentId']) && isset($_GET['postId'])) {
            reportComment($_GET['commentId'], $_GET['postId']);
        }
    }

    elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            deleteComment($_GET['commentId']);
        }
    } 

    elseif ($_GET['action'] == 'deconnexion') {
        //session_unset();
        // session_destroy();
        header('Location: index.php');
        exit;
    }
}

else {
    listPosts();
}

