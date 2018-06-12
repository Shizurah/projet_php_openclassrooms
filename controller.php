<?php

require_once('model/Post.php');
require_once('model/PostsManager.php');

require_once('model/User.php');
require_once('model/UserManager.php');

require_once('model/Comment.php');
require_once('model/CommentsManager.php');


function startSession() {
    if (!isset($_SESSION)) {
        session_start();
    }
}

function mainPage() {
    startSession();
    require_once('view/display_main_blog_page.php');
}

function listPosts($page) { 
    startSession();

    $postsManager = new PostsManager();
    $nbPosts = $postsManager->countPosts();

    $nbPostsToDisplayOnAPage = 5;
    $nbPages = ceil($nbPosts / $nbPostsToDisplayOnAPage);

    if ($page <= $nbPages) {
        $firstPostToDisplay = ($page - 1) * $nbPostsToDisplayOnAPage;
        $posts = $postsManager->getPostsListForReading($firstPostToDisplay, $nbPostsToDisplayOnAPage);
    
        require_once('view/display_postsList.php');

    } else {
        throw new Exception('cette page n\'existe pas.');
    }
    
}

function post($postId) {
    startSession();

    $postsManager = new PostsManager();
    $post = $postsManager->get($postId);

    $commentsManager = new CommentsManager();
    $comments = $commentsManager->getComments($postId);
    
    require_once('view/display_post_and_comments.php');   
}

function postForWritting() {
    startSession();
    
    if (isset($_SESSION['pseudo'])) {
        require_once('view/display_tinyMce.php');

    } else {
        require_once('view/connexion.php');
    }
}

function addPost($title, $content) {
    startSession();

    if (isset($_SESSION['pseudo'])) {
        $postsManager = new PostsManager();
        $postsManager->add($title, $content);

        $post = $postsManager->getLastPost();

        require_once('view/display_tinyMce.php');

    } else {
        require_once('view/connexion.php');
    }
}

function postForUpdating($postId) {
    startSession();

    if (isset($_SESSION['pseudo'])) {
        $postsManager = new PostsManager();
        $post = $postsManager->get($postId);
        
        require_once('view/display_tinyMce.php');

    } else {
        require_once('view/connexion.php');
    }
}

function updatePost($postId, $postTitle, $postContent) {
    startSession();

    if (isset($_SESSION['pseudo'])) {
        $postsManager = new PostsManager();
        $postsManager->update($postId, $postTitle, $postContent);

        require_once('view/display_tinyMce.php');

    } else {
        require_once('view/connexion.php');
    }
}

function addComment($postId, $pseudo, $content) {
    $commentsManager = new CommentsManager();
    $commentsManager->add($postId, $pseudo, $content);
}

function connexionPage() {
    require_once('view/connexion.php');
}

function connexion($pseudo, $password) {
    $userManager = new UserManager();

    $user = $userManager->getUser($pseudo, $password);

    if (!empty($user)) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;

        managementSpace();

    } else {
        require_once('view/connexion.php');
    }
}

function managementSpace() {
    startSession();
    
    if (isset($_SESSION['pseudo'])) {
        $postsManager = new PostsManager();
        $posts = $postsManager->getPostsListForManagement();
        
        $commentsManager = new CommentsManager();
        $reportedComments = $commentsManager->getReportedComments();

        require_once('view/display_management_space.php');

    } else {
        require_once('view/connexion.php');
    }
}

function deletePost($postId) {
    startSession();

    if (isset($_SESSION['pseudo'])) {
        $postsManager = new PostsManager();
        $postsManager->delete($postId);

        $commentsManager = new CommentsManager();
        $commentsManager->deleteAllCommentsForOnePost($postId);

        managementSpace();

    } else {
        require_once('view/connexion.php');
    }
}

function reportComment($commentId, $postId) {
    $commentsManager = new CommentsManager();
    $commentsManager->reportComment($commentId);

    post($postId);
}

function deleteComment($commentId) {
    startSession();

    if (isset($_SESSION['pseudo'])) {
        $commentsManager = new CommentsManager;
        $commentsManager->delete($commentId);

        managementSpace();
        // require_once('view/display_management_space.php');

    } else {
        require_once('view/connexion.php');
    }
}