<?php

$followed_id = $_POST["followed_id"];
require_once("process_follow.php");
follow_user_by_id($followed_id);
require_once("get_user_info.php");
echo get_number_of_followers($followed_id);
die();
