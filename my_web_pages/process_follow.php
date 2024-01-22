<?php

require_once("db_connect.php");


function follow_user_by_id($followed_id) {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    sec_session_start();
    if (login_check($mysqli)) {
        $follower_id = $_SESSION['user_id'];
        $stmt = $mysqli->prepare(
            "INSERT INTO followers VALUES (?, ?)"
        );
        $stmt->bind_param("ii", $follower_id, $followed_id);
        return $stmt->execute();
    }
    return false;
}

?>