<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myProfile</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php require("headerProfile.php") ?>

    <?php
    require_once("db_connect.php");
    sec_session_start();
    $post_id = $_GET["post_id"];
    echo($post_id);
    require_once("get_post_info.php");
    $post = get_post_info($post_id);
    require_once("get_user_info.php");
    $author = get_user_info($post["author"]);
    ?>
    <h1>Replying to <a href="./userProfile.php?user_id=<?php echo $author["id"] ?>"><?php echo $author["username"] ?></a></h1>
    <?php
    if (login_check($mysqli)):
    ?>
        <main class="container p-2 mt-5">
    <?php
        require_once("get_post_info.php");
        $posts = get_reply_posts($post_id);
        require_once("show_posts.php");
        show_posts($posts);
    ?>
        </main>
    <?php
    endif;
    ?>
</body>

</html>

