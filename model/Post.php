<?php

class Post {

    private $_id;
    private $_title;
    private $_postDateFr;
    private $_content;

    public function __construct(array $data) { 
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function id() {
        return $this->_id;
    }

    public function title() {
        return $this->_title;
    }

    public function postDateFr() {
        return $this->_postDateFr;
    }

    public function content() {
        return $this->_content;
    }

    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function setTitle($title) {
        if (is_string($title) && strlen($title) <= 250)  {
            $this->_title = $title;
        }  
    }

    public function setPostDateFr($date) {
        $this->_postDateFr = $date;
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }   
    }
}