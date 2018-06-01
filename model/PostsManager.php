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

        $req = $this->_db->query('SELECT id, title, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS postDateFr, content FROM posts WHERE id = '.$postId);

        $data = $req->fetch();

        return new Post($data);
    }

    public function getLastPost() {
        $req = $this->_db->prepare('SELECT id FROM posts ORDER BY id DESC LIMIT 1');
        $req->execute();

        $data = $req->fetch();

        return new Post($data);
    }

    public function getPostsList() {
        $req = $this->_db->query('SELECT id, title, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS postDateFr, content FROM posts ORDER BY postDateFr');

        $posts = [];

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function update(Post $post) {       

        $req = $this->_db->prepare('UPDATE posts SET title = :post_title, content = :post_content WHERE id = :post_id');

        $req->execute(array(
            'post_title' => $post->title(),
            'post_content' => $post->content(),
            'post_id' => $post->id()
        ));
    }

    public function delete(Post $post) {
        $req = $this->_db->exec('DELETE FROM posts WHERE id =' . $post->id());
    }
    
}