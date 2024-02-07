<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>
<body>
    <?php
    require "header.php";
    if (isset($_GET["word"])):
    ?>
    <?php
    require_once("db_info.php");
    require_once("get_user_info.php");
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $stmt = $mysqli->prepare(
        "SELECT id, username, email, birthdate, profile_image, bio 
        FROM members
        WHERE username LIKE ?
    ");
    $param = "%{$_GET['word']}%";
    $stmt->bind_param("s", $param);
    $stmt->execute(); 
    $stmt->store_result();
    $stmt->bind_result($user_id, $username, $email, $birthdate, $profile_image_path, $bio);
    $users = array();
    while ($stmt->fetch()) {
        array_push($users, Array(
            "id" => $user_id,
            "username" => $username,
            "email" => $email,
            "birthdate" => $birthdate,
            "profile_image_path" => $profile_image_path,
            "followers" => get_number_of_followers($user_id),
            "followings" => get_number_of_followings($user_id),
            "bio" => $bio
        ));
    }
    ?>
    <?php require("navbar.php"); ?>
    <main class="m-3">
        <?php require_once("search_form.php"); ?>
        <h1 class="m-2">Search results:</h1>
        <?php
        require_once("users_list.php");
        show_users($users);
        endif;
        ?>
    </main>
</body>
</html>