<?php

require_once("model/CommentDB.php");
require_once("ViewHelper.php");

class CommentController {

    public static function create() {
        $validData = isset($_POST["comment"]) && !empty($_POST["comment"]) &&
                     isset($_POST["post_id"]) && !empty($_POST["post_id"]);

        if ($validData) {
            CommentDB::insert($_POST["comment"], $_SESSION["user"]["id"], $_POST["post_id"]);
        }
        ViewHelper::redirect(BASE_URL . "posts/show?id=" . $_POST["post_id"]);
    }    
}