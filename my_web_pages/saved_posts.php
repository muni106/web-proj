<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>Saved posts</title>
</head>

<body>
    <?php
    require "header.php";
    require "navbar.php";
    ?>
    <?php
    if (login_check($mysqli)) :
    ?>
        <main class="container p-2 mt-3">
            <h1 class="fw-bolder border-bottom py-3">Saved posts</h1>
            <?php
            require_once("get_feed.php");
            require_once("save_post_utils.php");
            require_once("show_posts.php");
            $posts = get_saved_posts($_SESSION["user_id"]);
            show_posts($posts);
            ?>

        </main>
        <aside id="left_bar_desktop">
            <?php require_once("search_form.php") ?>
        </aside>
    <?php
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>