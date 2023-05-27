<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class ThreadController {

    public static function allPosts() {
        
    }

    public static function index() {
        ViewHelper::render("view/threads/index.php");
    }

}