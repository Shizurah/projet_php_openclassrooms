<?php

require_once('model/Post.php');
require_once('model/PostsManager.php');

require_once('model/User.php');
require_once('model/UserManager.php');

require_once('model/Comment.php');
require_once('model/CommentsManager.php');



function listPosts() {  
    $postsManager = new PostsManager();
    $posts = $postsManager->getPostsList();
   
    require_once('view/display_postsList.php');

    // $posts->closeCursor();
}


function post($postId) {
    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);

    $commentsManager = new CommentsManager();
    $comments = $commentsManager->getComments($postId);
    
    require_once('view/display_post_and_comments.php');
}


function managementSpace() {
    $userManager = new UserManager();
    $user = $userManager->getUser($_POST['pseudo'], $_POST['password']);

    require_once('view/display_management_space.php');
}