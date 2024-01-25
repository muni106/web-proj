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
    <?php require("headerProfile.php") ?>

    <?php 
    require_once("db_connect.php");
    sec_session_start();
    require_once("get_user_info.php");
    $user_info = get_user_info($_SESSION["user_id"]);
    ?>
    <div class="row m-2">
        <div id="profileImageContainer" class="col-3">
            <img src="./show_image.php?image=<?php echo($user_info["profile_image_path"]); ?>" alt="profile image" id="profileImage" >
        </div>
        <div id="" class="col-6">
            <h1 id="profileNickname"><?php echo($user_info["username"]) ?></h1>
            <p class="lh-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate iure quas expedita necessitatibus odit? In, nemo.</p>
            <div>
                <a class="followButton"><span class="fw-bold">following</span>: <?php echo($user_info["followings"]) ?></a>
                <a class="followButton"><span class="fw-bold">follower</span>: <?php echo($user_info["followers"]) ?></a>
            </div>
        </div>
        <div class="col-3">
            <button class="btn p-0 followButton">modify profile</button>
        </div>
    </div>
    <?php
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