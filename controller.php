<?php

require_once('model/Post.php');
require_once('model/PostsManager.php');
// require_once('Comment.php';)
// require_once('CommentManager.php';)



function listPosts() {  
    $postsManager = new PostsManager();
    $req = $postsManager->getPostsList();
   
    require_once('view/display_postsList.php');
}
