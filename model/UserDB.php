<?php

require_once "DBInit.php";

class UserDB {

     public static function insert($email, $password, $catname, $catAvatar) {
        $db = DBInit::getInstance();

        $emailExists = self::checkEmailExists($email);
        if ($emailExists) {
            return "email_exists";
        }

        $catNameExists = self::checkCatNameExists($catname);
        if ($catNameExists) {
            return "cat_name_exists";
        }
        
        $salt = bin2hex(random_bytes(16));
        $hashedPassword = hash("sha256", $password . $salt);
        $isAdmin = false;

        $statement = $db->prepare("INSERT INTO users (email, password, catavatar, catname, admin, salt)
            VALUES (:email, :password, :catavatar, :catname, :admin, :salt)");
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $hashedPassword);
        $statement->bindParam(":salt", $salt);
        $statement->bindParam(":catavatar", $catAvatar);
        $statement->bindParam(":catname", $catname);
        $statement->bindParam(":admin", $isAdmin);
        $statement->execute();
        $user = $statement->fetch();

        return $user;
    }

    public static function login($email, $password) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();
        $user = $statement->fetch();

        if ($user) {
            $hashedPassword = hash("sha256", $password . $user['salt']);

            if ($hashedPassword === $user['password']) {
                return $user;
            } else {
                return "incorrect_password";
            }
        } else {
            return "email_not_found";
        }
    }

    private static function checkEmailExists($email) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();
        $count = $statement->fetchColumn();

        return $count > 0;
    }

    private static function checkCatNameExists($catname) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE catname = :catname");
        $statement->bindParam(":catname", $catname);
        $statement->execute();
        $count = $statement->fetchColumn();

        return $count > 0;
    }

}