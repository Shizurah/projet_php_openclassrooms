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

    // elseif ($_GET['action'] == 'connexion') {
    //     if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    //         if ($_POST['pseudo'] == 'Jean' && $_POST['password'] == '45F!nb0H') {
    //             managementSpace();
    //         }
    //     }
    // }
}

else {
    listPosts();
}
