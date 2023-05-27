<?php

require_once "DBInit.php";

class ThreadDB {

    public static function getAllThreads() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM threads");
        $statement->execute();
        $threads = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $threads;
    }
    
}