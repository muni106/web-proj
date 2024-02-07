<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>For you</title>
</head>

<body>
    <?php
    require "header.php"
    ?>
    <?php
    if (login_check($mysqli)) :
    ?>
        <?php require("navbar.php") ?>
        <main class="container">
            <h1 class="fw-bolder border-bottom py-3">Posts</h1>
            <?php
            require_once("get_feed.php");
            $posts = get_feed_from_user_id($_SESSION["user_id"]);
            require_once("show_posts.php");
            show_posts($posts);
            ?>
        </main>
        <aside id="left_bar_desktop p-0">
            <?php require_once("search_form.php") ?>
        </aside>
    <?php
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>