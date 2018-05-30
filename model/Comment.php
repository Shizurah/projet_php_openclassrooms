<?php

class Comment {

    private $_id;
    private $_postId;
    private $_author;
    private $_commentDateFr;
    private $_content;
    private $_reportings;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' .ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
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

    public function commentDateFr() {
        return $this->_date;
    }

    public function content() {
        return $this->_content;
    }

    public function reportings() {
        return $this->_reportings;
    }


    //setters :

    public function setId($id) {
        $this->_id = $id;
    }

    public function setPostId($postId) {
        // if (is_int($postId) && $postId > 0) {
            $this->_postId = $postId;
        // }       
    }

    public function setAuthor($author) {
        if (is_string($author) && strlen($author) <= 250) {
            $this->_author = $author;
        }
    }

    public function setCommentDateFr($date) {
        $this->_date = $date;
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setReportings($reportings) {
        $this->_reportings = $reportings;
    }

}