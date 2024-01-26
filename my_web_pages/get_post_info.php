<?php

require_once("db_info.php");

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
