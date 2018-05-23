<?php

require_once('model/Manager.php');

class PostManager extends Manager {

    private $_db = $this->dbConnect();
    
    public function add(Post $post) { 

        $req = $this->_db->prepare('INSERT INTO posts(title, postDate, content) VALUES(:post_title, NOW(), :post_content)'); 

        $req->execute(array(
            :post_title => $post->title(),
            :post_content => $post->content()
        ));
    }

    public function getPostsList() {
        $req = $this->_db->query('SELECT * FROM posts');
    }

    public function get($postId) {    
        $req = $this->_db->query('SELECT * FROM posts WHERE id =' . $postId);
    }

    public function update(Post $post) {       

        $req = $this->_db->prepare('UPDATE posts SET title = :post_title, content = :post_content WHERE id = :post_id');

        $req->execute(array(
            :post_title => $post->title(),
            :post_content => $post->content(),
            :post_id => $post->id()
        ));
    }

    public function delete(Post $post) {
        $req = $this->_db->exec('DELETE FROM posts WHERE id =' . $post->id());
    }
    
}