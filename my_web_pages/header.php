<?php
    require_once("db_info.php");
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    require_once("db_connect.php");
    sec_session_start();
    require_once("get_user_info.php");
    $user_info = get_user_info($_SESSION["user_id"]); 
?>

<header>
    <nav class="navbar navbar-expand-lg d-flex justify-content-between align-items-center p-3 bg-white">
        <a href="">
            <img src="./show_image.php?image=<?php echo($user_info["profile_image_path"]); ?>" alt="profile image" id="profileImage" >
        </a> 
        <a href="" class="navbar-brand">
            <img src="./assets/images/logo.png" alt="SocialName" class="logo"/> 
        </a> 
        <button class="navbar-toggler navbar-toggler-icon" type="button"></button>
    </nav>
</header>
