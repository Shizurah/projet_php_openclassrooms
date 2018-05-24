<?php

class DbManager {

    public static function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=projet4_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    
    // protected function dbConnect() {
        
    //     $db = new PDO('mysql:host=localhost;dbname=projet3_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //     return $db;
        
    //     // private $_db;

    //     // protected function setDb(PDO $db) {
    //     //     $this->_db = $db;
    // }
    
}