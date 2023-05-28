<?php

require_once "DBInit.php";

class CommentDB {

    public static function insert($text, $user_id, $post_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO comments (text, user_id, post_id)
            VALUES (:text, :user_id, :post_id)");
        $statement->bindParam(":text", $text);
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":post_id", $post_id);
        $statement->execute();
        $commentId = $db->lastInsertId();

        return $commentId;
    }

    public static function commentsForPost($postId) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT c.id, c.text, c.user_id, c.post_id, c.timestamp, u.catname
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.post_id = :post_id");
        $statement->bindParam(":post_id", $postId);
        $statement->execute();
        $comments = $statement->fetchAll();

        return $comments;
    }
    
}