<!DOCTYPE html>
<html lang="en">

<?php
require_once("get_user_info.php");
$user_info = get_user_info($_GET["user_id"]);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($user_info["username"]) ?></title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./assets/js/follow_user.js"></script>

    <?php
    require("headerProfile.php");
    require("db_connect.php");
    $user_id = $_GET["user_id"];
    if (user_exists($user_id)) :
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
            <div class="row m-2">
                <div id="profileImageContainer" class="col-3">
                    <img src="show_image.php?image=<?php echo ($user_info["profile_image_path"]); ?>" alt="profile image" id="profileImage">
                </div>
                <div id="" class="col-6">
                    <h1 id="profileNickname"><?php echo ($user_info["username"]) ?></h1>
                    <p class="lh-sm"><?php echo ($user_info["bio"]) ?></p>
                    <div>
                        <a class="stats"><span class="fw-bold">following</span>: <?php echo ($user_info["followings"]) ?></a>
                        <a class="stats"><span class="fw-bold">followers</span>: <span id="num_followers"><?php echo ($user_info["followers"]) ?></span></a>
                    </div>
                </div>
                <?php
                sec_session_start();
                if ($user_info["id"] == $_SESSION["user_id"]) : ?>
                    <div class="col-3">
                        <a id="profileBtn" href="./signup.php?update" class="btn p-0 followButton">Update profile</a>
                    </div>
                <?php else : ?>
                    <form class="col-3" action="process_follow.php" method="get">
                        <label for="profileBtn" class="d-none">Click here to follow this user</label>
                        <input type="hidden" name="followed_id" value="<?php echo $user_info["id"]?>">
                        <button type="submit" id="profileBtn" type="button" class="btn p-0 followButton">Follow</button>
                    </form>
                <?php endif; ?>
            </div>
            <h1 class="fw-bolder border-bottom py-3">Posts</h1>
            <?php
            require_once("get_feed.php");
            $posts = get_posts_from_author_id($_GET["user_id"]);
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
    else :
    ?>
        <p> User does not exist </p>
    <?php
    endif;
    ?>

</body>

</html>