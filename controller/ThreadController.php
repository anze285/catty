<?php

require_once("model/UserDB.php");
require_once("model/PostDB.php");
require_once("ViewHelper.php");

class ThreadController {

    public static function allPosts() {
        
    }

    public static function index() {
        $posts = PostDB::getAll();
        ViewHelper::render("view/threads/index.php", [
            'posts' => $posts,
        ]);
    }

}