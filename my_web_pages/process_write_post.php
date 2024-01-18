<?php 

print_r($_POST);
print_r($_FILES);

$text = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $_POST["text"]);
$code = $_POST["code"];
$image = $_FILES["image"];

require("db_info.php");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

$stmt = $mysqli->prepare("INSERT INTO posts (body, code, image_path) VALUES (?, ?, ?) ");
$stmt->bind_param("sss", $text, $code, $image["tmp_name"]);
if (!$stmt->execute()) {
    echo "publish failed";
}
?>