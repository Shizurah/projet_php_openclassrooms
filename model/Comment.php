<?php

class Comment {

    private $_id;
    private $_postId;
    private $_author;
    private $_date;
    private $_content;

    public function __construct($postId, $author, $content) {
        $this->setPostId($postId);
        $this->setAuthor($author);
        $this->setContent($content);
    }

    // getters :

    public function id() {
        return $this->_id;
    }

    public function postId() {
        return $this->_postId;
    }

    public function author() {
        return $this->_author;
    }

    public function date() {
        return $this->_date;
    }

    public function content() {
        return $this->_content;
    }


    //setters :

    // public function setId($id) {
    //     $this->_id = $id;
    // }

    public function setPostId($postId) {
        if (is_int($postId) && $postId > 0)
            $this->_postId = $postId;
    }

    public function setAuthor($author) {
        if (is_string($author) && strlen($author) <= 250) {
            $this->_author = $author;
        }
    }

    // public function setDate($date) {
    //     $this->_date = $date;
    // }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

}