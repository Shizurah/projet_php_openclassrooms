<?php
if (!isset($_SESSION)) {
    session_start();
}

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
}


function post($postId) {
    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);

    $commentsManager = new CommentsManager();
    $comments = $commentsManager->getComments($postId);
    
    require_once('view/display_post_and_comments.php');
}

function postForUpdating($postId) {
    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);
    
    require_once('view/display_tinyMce.php');
  
}

function addComment($postId, $pseudo, $content) {
    $commentsManager = new CommentsManager();

    // $data = array(
    //     'postId' => $postId,
    //     'author' => $pseudo,
    //     'content' => $content
    // );

    // $comment = new Comment(array(
    //     'postId' => $postId,
    //     'author' => $pseudo,
    //     'content' => $content
    // ));

    $commentsManager->add($postId, $pseudo, $content);
}


function managementSpace() {
    // $userManager = new UserManager();
    // $user = $userManager->getUser($pseudo, $password);
    // $_SESSION['admin'] = $pseudo;

    $postsManager = new PostsManager();
    $posts = $postsManager->getPostsList();
    
    $commentsManager = new CommentsManager();
    $reportedComments = $commentsManager->getReportedComments();

    require_once('view/display_management_space.php');
}

function addPost($title, $content) {
    $postsManager = new PostsManager();
    $postsManager->add($title, $content);

    $post = $postsManager->getLastPost();
    header('Location: view/display_tinyMce.php?lastPost=' .$post->id());
    exit;
    // require_once('view/display_tinyMce.php');

    // $post = new Post($title, $content)

    // $postsManager->add($post);
}

function updatePost($postId) {

}

function deletePost($postId) {
    $postsManager = new PostsManager();
    $postsManager->delete($postId);

    managementSpace();
}

function deleteComment($commentId) {
    $commentsManager = new CommentsManager;
    $commentsManager->delete($commentId);

    header('Location: index.php?action=connexion');
    exit;
}