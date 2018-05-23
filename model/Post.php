<?php

class Post {

    private $_id;
    private $_title;
    private $_postDate;
    private $_content;

    // public function __construct($title, $content) { // passer un tableau $data en paramètre, et appeler méthode d'hydratation ?
    //     $this->setTitle($title);
    //     $this->setContent($content);
    // }

    public function __construct(array $data) { // ce code permet de gérer des objets plutôt que des array pour manipuler la réponse apportée par une requête sql
        $this->hydrate(array $data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // getters :

    public function id() {
        return $this->_id;
    }

    public function title() {
        return $this->_title;
    }

    public function postDate() {
        return $this->_postDate;
    }

    public function content() {
        return $this->_content;
    }

    // setters :

    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function setTitle($title) {
        if (is_string($title) && strlen($title) <= 250)  {
            $this->_title = $title;
        }  
    }

    public function setPostDate($date) {
        $this->_date = $date;
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }   
    }
}