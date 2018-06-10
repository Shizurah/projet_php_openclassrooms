<?php

require_once('controller.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'postsList') {
        if (isset($_GET['page'])) {
            listPosts($_GET['page']);
        }   
    }

    elseif ($_GET['action'] == 'blog') {
        mainPage();
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

    elseif ($_GET['action'] == 'connexionPage') {
        connexionPage();
    }

    elseif ($_GET['action'] == 'connexion') {
        if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
            connexion($_POST['pseudo'], $_POST['mdp']);
        }
    }

    // retour à l'espace d'administration qd connecté :
    elseif ($_GET['action'] == 'mySpace') { 
        managementSpace();
    }

    elseif ($_GET['action'] == 'postWritting') {
        postForWritting();
    }

    elseif ($_GET['action'] == 'addedPost') {
        if (isset($_POST['chapter-title']) && isset($_POST['chapter-content'])) {
            addPost($_POST['chapter-title'], $_POST['chapter-content']);  
        }
    }

    elseif ($_GET['action'] == 'postUpdating') {
        if (isset($_GET['postId']) && $_GET['postId'] > 0) {
            postForUpdating($_GET['postId']);
        }
    }

    elseif ($_GET['action'] == 'updatedPost') {
        if(isset($_GET['postId']) && $_GET['postId'] > 0 && isset($_POST['chapter-title']) && isset($_POST['chapter-content'])) {
            updatePost($_GET['postId'], $_POST['chapter-title'], $_POST['chapter-content']);
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
        session_start();
        session_unset();
        session_destroy();
        
        header('Location: index.php');
        exit;
    }

} else {
    // var_dump($_SESSION);
    mainPage();
}

