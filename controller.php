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


function mainPage() {
    require_once('view/display_main_blog_page.php');
}

function listPosts($page) {  
    $postsManager = new PostsManager();
    $nbPosts = $postsManager->countPosts();

    $nbPostsToDisplayOnAPage = 5;
    $nbPages = ceil($nbPosts / $nbPostsToDisplayOnAPage);

    $firstPostToDisplay = ($page - 1) * $nbPostsToDisplayOnAPage;
    $posts = $postsManager->getPostsList($firstPostToDisplay, $nbPostsToDisplayOnAPage);
   
    require_once('view/display_postsList.php');
}

function post($postId) {
    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);

    $commentsManager = new CommentsManager();
    $comments = $commentsManager->getComments($postId);
    
    require_once('view/display_post_and_comments.php');
}

function postForWritting() {
    require_once('view/display_tinyMce.php');
}

function addPost($title, $content) {
    $postsManager = new PostsManager();
    $postsManager->add($title, $content);

    $post = $postsManager->getLastPost();
    require_once('view/display_tinyMce.php');
    // require_once('view/display_tinyMce.php');

    // $post = new Post($title, $content)

    // $postsManager->add($post);
}

function postForUpdating($postId) {
    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);
    
    require_once('view/display_tinyMce.php');
  
}

function updatePost($postId, $postTitle, $postContent) {
    $postsManager = new PostsManager();
    $postsManager->update($postId, $postTitle, $postContent);

    require_once('view/display_tinyMce.php');
}

function addComment($postId, $pseudo, $content) {
    $commentsManager = new CommentsManager();
    $commentsManager->add($postId, $pseudo, $content);
}


function managementSpace() {
    $postsManager = new PostsManager();
    $posts = $postsManager->getPostsList();
    
    $commentsManager = new CommentsManager();
    $reportedComments = $commentsManager->getReportedComments();

    require_once('view/display_management_space.php');
}

function deletePost($postId) {
    $postsManager = new PostsManager();
    $postsManager->delete($postId);

    $commentsManager = new CommentsManager();
    $commentsManager->deleteAllCommentsForOnePost($postId);

    managementSpace();
}

function reportComment($commentId, $postId) {
    $commentsManager = new CommentsManager();
    $commentsManager->reportComment($commentId);

    post($postId);
}

function deleteComment($commentId) {
    $commentsManager = new CommentsManager;
    $commentsManager->delete($commentId);

    header('Location: index.php?action=connexion');
    exit;
}