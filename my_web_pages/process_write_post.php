<?php 


require_once("db_info.php");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
require_once("db_connect.php");

sec_session_start();
print_r($_SESSION);
if (login_check($mysqli)) {
    print_r($_POST);
    print_r($_FILES);
    
    $user_id = $_SESSION['user_id'];
    $text = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $_POST["text"]);
    $code = $_POST["code"];
    $image = $_FILES["image"];
    $stmt = $mysqli->prepare("INSERT INTO posts (author, body, code, image_path) VALUES (?, ?, ?, ?) ");
    $stmt->bind_param("isss", $_SESSION["user_id"], $text, $code, $image["tmp_name"]);
    if (!$stmt->execute()) {
        echo "publish failed";
    }
}
?>