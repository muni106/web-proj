<?php

require_once("db_info.php");

function get_post_info($post_id) {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
        "SELECT author, body, code, image_path, reply, datetime
        FROM posts
        WHERE id = ?
    ");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($author, $body, $code, $image_path, $reply, $datetime);
    $stmt->fetch();
    return Array(
        "id" => $post_id,
        "author" => $author,
        "body" => $body,
        "code" => $code,
        "image_path" => $image_path,
        "reply" => $reply,
        "datetime" => $datetime,
        "like" => get_likes_of_post($post_id)
    );
}

function get_likes_of_post($post_id) {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $count_stmt = $mysqli->prepare(
        "SELECT COUNT(*)
        FROM likes
        WHERE post_id = ?
    ");
    $count_stmt->bind_param("i", $post_id);
    $count_stmt->execute();
    $count_stmt->bind_result($count);
    $count_stmt->fetch();
    return $count;
}

function get_reply_posts($father_id) {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
        "SELECT id, author, body, code, image_path, reply, datetime
        FROM posts
        WHERE reply = ?
    ");
    $stmt->bind_param("i", $father_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($post_id, $author, $body, $code, $image_path, $reply, $datetime);
    $posts = array();
    while ($stmt->fetch()) {
        array_push($posts, array(
            "father" => $father_id,
            "id" => $post_id,
            "author" => $author,
            "body" => $body,
            "code" => $code,
            "image_path" => $image_path,
            "reply" => $reply,
            "datetime" => $datetime,
            "likes" => get_likes_of_post($post_id)
        ));
    }
    return $posts;
}

function get_comments_number(int $post_id): int {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $count_stmt = $mysqli->prepare(
        "SELECT COUNT(*) FROM posts WHERE reply = ?
    ");
    $count_stmt->bind_param("i", $post_id);
    $count_stmt->execute();
    $count_stmt->bind_result($count);
    $count_stmt->fetch();
    return $count;
}