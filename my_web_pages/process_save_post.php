<?php
require('db_connect.php');
sec_session_start();
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
$username = $_SESSION["user_id"];
$post_id = $_POST["post_id"];

function get_id_from_username(string $username): int {
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT id FROM members WHERE username = ?")) {
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);
    $stmt->fetch();
    return (int)$result;
    }
}
$user_id = get_id_from_username($username);

function save_post(int $post_id, int $user_id) {
   global $mysqli; 
   if ($stmt = $mysqli->prepare("INSERT into saved_posts (post_id, user_id) VALUES (?, ?)")) {
        $stmt->bind_param("ii", $post_id, $user_id);
        $stmt->execute();
   }
}

save_post($post_id, $user_id);
?>