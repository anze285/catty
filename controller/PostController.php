<?php

require_once("model/UserDB.php");
require_once("model/ThreadDB.php");
require_once("model/PostDB.php");
require_once("model/CommentDB.php");
require_once("ViewHelper.php");

class PostController {

    public static function new($notice = "", $formData = []) {
        $threads = ThreadDB::getAllThreads();
        ViewHelper::render("view/posts/new.php", [
            'threads' => $threads,
            'notice' => $notice,
            'formData' => $formData,
        ]);
    }

    public static function create() {
        $validData = isset($_POST["title"]) && !empty($_POST["title"]) && 
                isset($_POST["thread"]) && !empty($_POST["thread"]) &&
                ((isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) || 
                isset($_POST["text"]) && !empty($_POST["text"]));

        if ($validData) {
            $destination = "";

            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
                $file = $_FILES["photo"];
                
                // Validate file size
                $maxFileSize = 5 * 1024 * 1024; // 5MB
                if ($file["size"] > $maxFileSize) {
                    self::new("File size exceeds the maximum size limit.", $_POST);
                    exit;
                }
                
                // Validate file type (allow only images)
                $allowedTypes = ["image/jpeg", "image/png"];
                if (!in_array($file["type"], $allowedTypes)) {
                    self::new("Invalid file type. Only JPEG and PNG images are allowed.", $_POST);
                    exit;
                }
                
                $filename = uniqid() . "_" . $file["name"];
                
                $destination = "post_images/" . $filename;
                if (move_uploaded_file($file["tmp_name"], "assets/" . $destination)) {
                    // File upload successful
                } else {
                    self::new("Error moving the uploaded file.", $_POST);
                    exit;
                }
            } else {
                if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] != 4) {
                    self::new("Error uploading the file.", $_POST);
                    exit;
                }
            }


            $postId = PostDB::insert($_POST["title"], $_POST["text"], $destination, $_SESSION["user"]["id"], $_POST["thread"]);

            ViewHelper::redirect(BASE_URL . "posts/show?id=" . $postId);

        } else {
            self::new("Image or text description is required.", $_POST);
        }
    }

    public static function show($postId = null, $notice = "") {
        if (!$postId && isset($_GET["id"])) {
            $postId = $_GET["id"];
        }
        $post = PostDB::get($postId);
        $comments = CommentDB::commentsForPost($postId);


        ViewHelper::render("view/posts/show.php", [
            'post' => $post,
            'comments' => $comments,
            'notice' => $notice,
        ]);
    }

    public static function edit($notice = "", $postId = null) {
        if (!$postId && isset($_GET["id"])) {
            $postId = $_GET["id"];
        }
        $post = PostDB::get($postId);
        $threads = ThreadDB::getAllThreads();
        ViewHelper::render("view/posts/edit.php", [
            'threads' => $threads,
            'notice' => $notice,
            'post' => $post,
        ]);
    }

    public static function update() {
        $validData = isset($_POST["title"]) && !empty($_POST["title"]) && 
            isset($_POST["thread"]) && !empty($_POST["thread"]) &&
            isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validData) {
            $postId = $_POST["id"];
            $post = PostDB::get($postId);

            if ($post && isset($_SESSION["user"]) && $post["uid"] == $_SESSION["user"]["id"]) {
                PostDB::update($_POST["title"], $_POST["text"], $_POST["thread"], $postId);
                ViewHelper::redirect(BASE_URL . "posts/show?id=" . $postId);
            } else {
                self::edit("You are not authorized to update this post.", $postId);
            }
        } else {
            self::edit("Something went wrong", $_POST["id"]);
        }
    }

}