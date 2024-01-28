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
        <a href="" class="navbar-brand">
            <img src="./assets/images/logo.png" alt="SocialName" class="logo"/> 
        </a> 
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
            <span></span>
            </label>

            <ul class="menu__box">
            <li><a class="menu__item" href="#">Home</a></li>
            <li><a class="menu__item" href="#">About</a></li>
            <li><a class="menu__item" href="#">Team</a></li>
            <li><a class="menu__item" href="#">Contact</a></li>
            <li><a class="menu__item" href="#">Twitter</a></li>
            </ul>
        </div>
    </nav>
</header>
