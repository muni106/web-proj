<?php
require('db_connect.php');
require_once("save_post_utils.php");
sec_session_start();
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
$username = $_SESSION["username"];
$post_id = $_POST["post_id"];

$user_id = get_id_from_username($username);
save_post($post_id, $user_id);
?>