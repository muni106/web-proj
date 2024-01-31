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
    $text = $_POST["text"];
    $code = $_POST["code"];
    $image = $_FILES["image"];
    $current_datetime = $_POST["current_datetime"];
    print_r($_POST["reply"]);
    if (isset($_POST["reply"])) {
        $reply = $_POST["reply"];
    } else {
        $reply = NULL;
    };
    if ($image["error"] == 0) { // if the image was loaded correctly
        $server_image_filename = "/images/".pathinfo($image["tmp_name"])["basename"];
        move_uploaded_file($image["tmp_name"], $server_image_filename);
    } else {
        $server_image_filename = NULL;
    }
    $stmt = $mysqli->prepare("INSERT INTO posts (author, body, code, image_path, datetime, reply) VALUES (?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("isssss", $_SESSION["user_id"], $text, $code, $server_image_filename, $current_datetime, $reply);
    if (!$stmt->execute()) {
        echo "publish failed";
    } else {
        header('Location: feed.php', true, 303);
        die();
    }
}
