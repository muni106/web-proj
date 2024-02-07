<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Following</title>
</head>
<body>
    <?php
    require_once("db_info.php");
    require_once("get_user_info.php");
    $user_id = $_GET["user_id"];
    $following = get_following($user_id);
    require_once("users_list.php");
    show_users($following);
    ?>
</body>
</html>
