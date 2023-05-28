<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/ThreadController.php");
require_once("controller/PostController.php");
require_once("controller/CommentController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");
define("BOOTSTRAP_CSS_URL", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css");
define("BOOTSTRAP_JQUERY_URL", "https://code.jquery.com/jquery-3.5.1.slim.min.js");
define("BOOTSTRAP_JS_URL", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js");


$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    # user
    "registration" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::register();
        } else {
            UserController::registrationForm();
        }
    },
    "login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();
        } else {
            UserController::loginForm();
        }
    },
    "logout" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::logout();
        }
        else {
            ViewHelper::redirect(BASE_URL . "threads/index");
        }
    },
    # threads
    "threads/index" => function () {
        ThreadController::index();
    },
    # posts
    "posts/new" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            PostController::create();
        }
        else {
            PostController::new();
        }
    },
    "posts/show" => function () {
        PostController::show();
    },
    # comments
    "comment/create" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            CommentController::create();
        }
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "threads/index");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
