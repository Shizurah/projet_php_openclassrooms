<?php

class User {

    private $_id;
    private $_pseudo;
    private $_password;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set' .ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function id() {
        return $this->_id;
    }

    public function pseudo() {
        return $this->_pseudo;
    }

    // public function password() {
    //     return $this->_password;
    // }

    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setPseudo($pseudo) {
        if (is_string($pseudo) && strlen($pseudo) <= 50) {
            $this->_pseudo = $pseudo;
        }
    }   
}