<?php

class Post {

    private $_id;
    private $_title;
    private $_date;
    private $_content;

    public function __construct($title, $content) {
        $this->setTitle($title);
        $this->setContent($content);
    }

    // getters :

    public function id() {
        return $this->_id;
    }

    public function title() {
        return $this->_title;
    }

    public function date() {
        return $this->_date;
    }

    public function content() {
        return $this->_content;
    }

    // setters :

    // public function setId($id) {
    //     $this->_id = $id;
    // }

    public function setTitle($title) {
        if (is_string($title) && strlen($title) <= 250)  {
            $this->_title = $title;
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