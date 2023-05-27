<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function registrationForm($notice = "") {
        ViewHelper::render("view/user/registration.php", [
            'notice' => $notice
        ]);
    }

    public static function register() {
        $validData = isset($_POST["email"]) && !empty($_POST["email"]) && 
                isset($_POST["catname"]) && !empty($_POST["catname"]) &&
                isset($_POST["password"]) && !empty($_POST["password"]);

        if ($validData) {
            $registerReturn = UserDB::insert($_POST["email"], $_POST["password"], $_POST["catname"], $_POST["catavatar"]);
            
            if ($registerReturn === "email_exists") {
                // Email exists
                self::registrationForm("This email is already in use.");
            } elseif ($registerReturn === "cat_name_exists") {
                // CatName exists
                self::registrationForm("This CatNick is already in use.");
            } else {
                // Register successful
                $_SESSION['user'] = $registerReturn;
                ViewHelper::redirect(BASE_URL . "threads");
            }

        } else {
            self::registrationForm("Something went wrong.");
        }
    }

    public static function loginForm($notice = "") {
        ViewHelper::render("view/user/login.php", [
            'notice' => $notice
        ]);
    }
    
    public static function login() {
        $validData = isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["password"]) && !empty($_POST["password"]);

        if ($validData) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $loginReturn = UserDB::login($email, $password);
            if ($loginReturn === "incorrect_password") {
                // Wrong pass
                self::loginForm("Wrong password. Please try again.");
            } elseif ($loginReturn === "email_not_found") {
                // Email not found
                self::loginForm("User with this email doesn't exists.");
            } else {
                // Login successful
                $_SESSION['user'] = $loginReturn;
                ViewHelper::redirect(BASE_URL . "threads");
            }
        } else {
            self::loginForm("Something went wrong.");
        }
    }

}