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
        <aside id="menu_desktop">
            <img src="assets/images/logo.png" alt="logo">
            <ul>
                <li>
                    <a href="feed.php">
                        <img src="./assets/images/Home.png" alt="homeImg">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="./assets/images/Explore.png" alt="explore">
                        Explore
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="./assets/images/Saved.png" alt="savedPosts">
                        Saved
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="./assets/images/Notifications.png" alt="notifications">
                        Notifications
                    </a>
                </li>
                <li>
                    <a href="write_post.php">
                        <img src="./assets/images/Write.png" alt="writePost">
                        Write
                    </a>
                </li>
                <li>
                    <a href="userProfileMe.php">
                        <img src="./assets/images/Profile.png" alt="profilePersonal">
                        Profile
                    </a>
                </li>
            </ul>
        </aside>
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
            <form>
                <label for="searching" id="search-bar">
                    <input id="search-input" type="text" placeholder="Someone.." />
                    <input type="image" src="assets/images/Explore.png" alt="Submit"/>
                    <!-- <img src="assets/images/Explore.png" alt="search"> -->
                </label>
            </form>
        </aside>
    <?php
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>