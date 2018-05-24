<?php

class UserManager {

    private $_db;

    public function __construct() {
        $this->_db = DbManager::dbConnect();
    }

    public function getUser($pseudo, $password) {
        $req = $this->_db->prepare('SELECT id, pseudo INTO users WHERE pseudo = :pseudo AND userPassword = :userPassword');

        $req->execute(array(
            'pseudo' => $pseudo,
            'userPassword' => $password
        ));

        $data = $req->fetch();

        return new User($data);
    }
}