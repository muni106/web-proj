<?php
require_once("db_connect.php");
sec_session_start();
header("Location: ./userProfile.php?user_id=".$_SESSION["user_id"]);
die();