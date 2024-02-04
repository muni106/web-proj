<title>
    Followers
</title>
<?php
require_once("db_info.php");
require_once("get_user_info.php");
$user_id = $_GET["user_id"];
$following = get_followers($user_id);
require_once("users_list.php");
show_users($following);
?>