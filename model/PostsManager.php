<?php

require_once('model/DbManager.php');

class PostsManager {

    private $_db;

    public function __construct() {
        $this->_db = DbManager::dbConnect();
    }
    
    
    public function add($title, $content) { 

        $req = $this->_db->prepare('INSERT INTO posts(title, postDate, content) VALUES(:post_title, NOW(), :post_content)'); 

        $req->execute(array(
            'post_title' => $title,
            'post_content' => $content
        ));
    }

    public function get($postId) {
        $postId = (int) $postId;

        $req = $this->_db->prepare('SELECT id, title, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS postDateFr, content FROM posts WHERE id = ?');
        $req->execute(array($postId));
        
        $data = $req->fetch();

        if (!empty($data)) {
            return new Post($data);
        } else {
            throw new Exception(' ce chapitre n\'existe pas.');
        }
        
    }

    public function getLastPost() {
        $req = $this->_db->prepare('SELECT id FROM posts ORDER BY id DESC LIMIT 1');
        $req->execute();

        $data = $req->fetch();

        return new Post($data);
    }

    public function countPosts() {
        $req = $this->_db->query('SELECT COUNT(*) AS nbPosts FROM posts');

        $data = $req->fetch();

        $nbPosts = $data['nbPosts'];

        return $nbPosts;
    }

    public function getPostsListForReading($firstPostToDisplay, $nbPostsToDisplayOnAPage) {
        $req = $this->_db->prepare('SELECT id, title, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS postDateFr, content FROM posts ORDER BY postDateFr LIMIT :firstPost, :nbPosts');

        $req->bindParam(':firstPost', $firstPostToDisplay, PDO::PARAM_INT);
        $req->bindParam(':nbPosts', $nbPostsToDisplayOnAPage, PDO::PARAM_INT);
        $req->execute();

        $posts = [];

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function getPostsListForManagement() {
        $req = $this->_db->query('SELECT id, title, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS postDateFr, content FROM posts ORDER BY postDateFr');
        
        $posts = [];

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function update($postId, $postTitle, $postContent) {       

        $req = $this->_db->prepare('UPDATE posts SET title = :post_title, content = :post_content WHERE id = :post_id');

        $req->execute(array(
            'post_id' => $postId,
            'post_title' => $postTitle,
            'post_content' => $postContent            
        ));
    } 

    public function delete($postId) {
        $postToDelete = $this->_db->prepare('DELETE FROM posts WHERE id = ?');

        if ($this->exists($postId)) {
            $postToDelete->execute(array($postId));

        } else {
            throw new Exception(' ce chapitre n\'existe pas.');
        }
    }   

    public function exists($postId) {
        $req = $this->_db->prepare('SELECT id FROM posts WHERE id = ?');
        $req->execute(array($postId));

        $data = $req->fetch();

        return !empty($data);
    }
}