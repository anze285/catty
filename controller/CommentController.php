<?php

require_once("model/CommentDB.php");
require_once("ViewHelper.php");

class CommentController {

    public static function create() {
        $validData = isset($_POST["comment"]) && !empty($_POST["comment"]) &&
                     isset($_POST["post_id"]) && !empty($_POST["post_id"]);

        if ($validData) {
            if (isset($_SESSION["user"]) && isset($_SESSION["user"]["id"])) {
                CommentDB::insert($_POST["comment"], $_SESSION["user"]["id"], $_POST["post_id"]);
                PostController::show($_POST["post_id"]);
            } else {
                $notice = "In order to comment you need to be logged in.";
                PostController::show($_POST["post_id"], $notice);
            }
        }
        else{
            PostController::show($_POST["post_id"]);
        }
    }    
}