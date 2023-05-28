<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function registrationForm($notice = "", $formData = []) {
        ViewHelper::render("view/user/registration.php", [
            'notice' => $notice,
            'formData' => $formData,
        ]);
    }

    public static function register() {
        $validData = isset($_POST["email"]) && !empty($_POST["email"]) && 
                isset($_POST["catname"]) && !empty($_POST["catname"]) &&
                isset($_POST["password"]) && !empty($_POST["password"]);

        if ($validData) {
            if(strlen($_POST["password"]) < 5){
                // Weak password
                self::registrationForm("Password is too short.", $_POST);
            }
            else {
                $registerReturn = UserDB::insert($_POST["email"], $_POST["password"], $_POST["catname"], $_POST["catavatar"]);
            
                if ($registerReturn === "email_exists") {
                    // Email exists
                    self::registrationForm("This email is already in use.", $_POST);
                } elseif ($registerReturn === "cat_name_exists") {
                    // CatName exists
                    self::registrationForm("This CatNick is already in use.", $_POST);
                } else {
                    // Register successful
                    $_SESSION['user'] = $registerReturn;
                    ViewHelper::redirect(BASE_URL . "threads/index");
                }
            }

        } else {
            self::registrationForm("Something went wrong.");
        }
    }

    public static function loginForm($notice = "", $formData = []) {
        ViewHelper::render("view/user/login.php", [
            'notice' => $notice,
            'formData' => $formData,
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
                self::loginForm("Wrong password. Please try again.", $_POST);
            } elseif ($loginReturn === "email_not_found") {
                // Email not found
                self::loginForm("User with this email doesn't exists.");
            } else {
                // Login successful
                $_SESSION['user'] = $loginReturn;
                ViewHelper::redirect(BASE_URL . "threads/index");
            }
        } else {
            self::loginForm("Something went wrong.");
        }
    }

    public static function logout() {
        unset($_SESSION['user']);
    
        ViewHelper::redirect(BASE_URL . "threads/index");
    }

    public static function edit($notice = "", $success = "") {
        ViewHelper::render("view/user/edit.php", [
            'notice' => $notice,
            'success' => $success,
        ]);
    }

    public static function update() {
        $checkPassword = UserDB::checkPassword($_POST["password"], $_SESSION["user"]["id"]);
        if ($checkPassword === "incorrect_password") {
            self::edit("Wrong password. Please try again.");
        } elseif ($checkPassword === "correct_password") {
            $user = UserDB::update($_SESSION["user"]["id"], $_POST["catname"], $_POST["catavatar"]);
            if ($user) {
                $_SESSION["user"] = $user;
                self::edit("", "Successfully updated.");
            }
        } else {
            self::edit("Something went wrong, plese try again." . $checkPassword);
        }
    }

}