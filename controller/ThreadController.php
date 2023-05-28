<?php

require_once("model/UserDB.php");
require_once("model/PostDB.php");
require_once("model/ThreadDB.php");
require_once("ViewHelper.php");

class ThreadController {

    public static function allPosts() {
        
    }

    public static function index() {
        $threads = ThreadDB::getAllThreads();

        $threadActive = isset($_GET["thread_id"]) ? $_GET["thread_id"] : null;
        $posts = ($threadActive) ? PostDB::getAllForThread($threadActive) : PostDB::getAll();

        $notice = (empty($posts)) ? "No posts that's just CATastrofic. Create a CAT post right now." : "";

        ViewHelper::render("view/threads/index.php", [
            'posts' => $posts,
            'threads' => $threads,
            'threadActive' => $threadActive,
            'notice' => $notice,
        ]);
    }

}