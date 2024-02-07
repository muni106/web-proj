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
    <title>Following</title>
</head>
<body>
    <?php
    require_once("db_info.php");
    require_once("get_user_info.php");
    $user_id = $_GET["user_id"];
    $following = get_following($user_id);
    require_once("users_list.php");
    require("header.php");
    require("navbar.php");
    $user = get_user_info($user_id);
    ?>
    <main>
        <h1 class="p-1">Followers of <a href="./userProfile.php?user_id=<?php echo $user["id"] ?>"><?php echo $user["username"] ?></a></h1>
        <?php
        show_users($following);
        ?>   
    </main>

    <aside id="left_bar_desktop">
        <?php require_once("search_form.php") ?>
    </aside>
    ?>
</body>
</html>
