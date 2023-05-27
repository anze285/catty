<?php

require_once("model/UserDB.php");
require_once("model/ThreadDB.php");
require_once("model/PostDB.php");
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
                isset($_POST["thread"]) && !empty($_POST["thread"]);

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
            self::new("Something went wrong.");
        }
    }

    public static function show() {
        $post = PostDB::get($_GET["id"]);

        ViewHelper::render("view/posts/show.php", [
            'post' => $post,
        ]);
    }

}