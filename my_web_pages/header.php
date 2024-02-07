<?php
    require_once("db_info.php");
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    require_once("db_connect.php");
    sec_session_start();
    require_once("get_user_info.php");
    $user_info = get_user_info($_SESSION["user_id"]); 
?>


<header>
    <nav class="navbar navbar-expand-lg d-flex justify-content-between align-items-center p-2">
        <a href="./userProfileMe.php">
            <img src="./show_image.php?image=<?php echo($user_info["profile_image_path"]); ?>" alt="profile image" id="profileImage" >
        </a> 
        <a href="">
            <img src="./assets/images/logo.png" alt="Petris logo" class="logo"/> 
        </a> 
        <div class="hamburger-menu">
            <label id="menu__btn" for="menu__toggle">
                <span id="spanning"></span>
            </label>

            <ul id="menu__box">
            <li><a class="menu__item" href="index.php">Home</a></li>
            <li><a class="menu__item" href="show_search_result.php?word=">Explore</a></li>
            <li><a class="menu__item" href="saved_posts.php?">Saved</a></li>
            <li><a class="menu__item" href="notifications.php">Notifications</a></li>
            <li><a class="menu__item" href="write_post.php">Write</a></li>
            <li><a class="menu__item" href="userProifleMe.php">Profile</a></li>
            </ul>
        </div>
    </nav>
</header>

<script src="./assets/js/navbar.js"></script>
