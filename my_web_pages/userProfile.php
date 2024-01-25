<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myProfile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="row m-2">
        <div id="profileImage" class="col-3">
            <img src="./assets/images/logo.jpg" alt="profile image" class="w-100">
        </div>
        <div id="" class="col-6">
            <h1 id="profileNickname">Nickname</h1>
            <p class="lh-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur velit atque ex tempora reiciendis soluta nemo perspiciatis, accusamus quaerat, perferendis corporis unde beatae adipisci enim autem repellendus ipsa! Quae, facilis?</p>
            <div>
                <a class="followButton"><span class="fw-bold">following</span>: 50</a>
                <a class="followButton"><span class="fw-bold">follower</span>: 5</a>
            </div>
        </div>
        <div class="col-3">
            <button class="btn ">modify profile</button>
        </div>
    </div>
    <?php
    require_once("db_info.php");
    require_once "db_connect.php";
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    sec_session_start();
    if (login_check($mysqli)):
    ?>
        <main class="container p-2 mt-5 bg-white">
        <h1 class="fw-bolder border-bottom py-3">Posts</h1>
    <?php
        require_once("get_feed.php");
        $posts = get_posts_from_author_id($_SESSION["user_id"]);
        require_once("show_posts.php");
        show_posts($posts);
    ?>
        </main>
    <?php
    endif;
    ?>
</body>

</html>