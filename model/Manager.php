<?php

class Manager {
    
    protected function dbConnect() {
        
        $db = new PDO('mysql:host=localhost;dbname=projet3_php;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
        
    }
}