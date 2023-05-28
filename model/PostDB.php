<?php

require_once "DBInit.php";

class PostDB {

    public static function insert($title, $text, $photoUrl, $userId, $threadId) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO posts (title, text, photo_url, user_id, thread_id)
            VALUES (:title, :text, :photo_url, :user_id, :thread_id)");
        $statement->bindParam(":title", $title);
        $statement->bindParam(":text", $text);
        $statement->bindParam(":photo_url", $photoUrl);
        $statement->bindParam(":user_id", $userId);
        $statement->bindParam(":thread_id", $threadId);
        $statement->execute();
        $postId = $db->lastInsertId();

        return $postId;
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT p.id, p.title, p.text, p.photo_url, u.catname, t.title AS thread_title, t.id AS tid
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN threads t ON p.thread_id = t.id
            WHERE p.id = :id");

        $statement->bindParam(":id", $id);
        $statement->execute();
        $post = $statement->fetch();

        return $post;
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT p.id, p.title, p.text, p.photo_url, u.catname, t.title AS thread_title, t.id AS tid
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN threads t ON p.thread_id = t.id
            WHERE t.title NOT LIKE '%NSFW%'
            ORDER BY p.id DESC");

        $statement->execute();
        $posts = $statement->fetchAll();

        return $posts;
    }
    
    public static function getAllForThread($threadActive) {
        $db = DBInit::getInstance();

        $query = "SELECT p.id, p.title, p.text, p.photo_url, u.catname, t.title AS thread_title, t.id AS tid
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN threads t ON p.thread_id = t.id
            WHERE p.thread_id = :thread_id
            ORDER BY p.id DESC";

        $statement = $db->prepare($query);
        $statement->bindParam(":thread_id", $threadActive);
        $statement->execute();
        $posts = $statement->fetchAll();

        return $posts;
    }

    public static function getAllForUser($userId) {
        $db = DBInit::getInstance();

        $query = "SELECT p.id, p.title, p.text, p.photo_url, u.catname, t.title AS thread_title, t.id AS tid
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN threads t ON p.thread_id = t.id
            WHERE p.user_id = :user_id
            ORDER BY p.id DESC";

        $statement = $db->prepare($query);
        $statement->bindParam(":user_id", $userId);
        $statement->execute();
        $posts = $statement->fetchAll();

        return $posts;
    }

}