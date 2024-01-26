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
    $current_datetime = $_POST["current_datetime"];
    if ($image["error"] == 0) { // if the image was loaded correctly
        $server_image_filename = "/images/".pathinfo($image["tmp_name"])["basename"];
        move_uploaded_file($image["tmp_name"], $server_image_filename);
    } else {
        $server_image_filename = NULL;
    }
    $stmt = $mysqli->prepare("INSERT INTO posts (author, body, code, image_path, datetime) VALUES (?, ?, ?, ?, ?) ");
    $stmt->bind_param("issss", $_SESSION["user_id"], $text, $code, $server_image_filename, $current_datetime);
    if (!$stmt->execute()) {
        echo "publish failed";
    }
}
?>