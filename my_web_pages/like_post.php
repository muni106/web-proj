<?php
require_once("db_connect.php");
sec_session_start();
$user_id = $_SESSION["user_id"];
$post_id = $_POST["post_id"];

require_once("db_info.php");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
$insert_stmt = $mysqli->prepare(
    "INSERT IGNORE INTO likes (user_id, post_id) VALUES (?, ?)"
);
$insert_stmt->bind_param("ii", $user_id, $post_id);
$insert_stmt->execute();

require_once("get_post_info.php");
echo get_likes_of_post($post_id);
