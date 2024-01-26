<?php

require('db_connect.php');
sec_session_start();
$username = $_SESSION["username"];
$current_datetime = $_POST["current_datetime"];
if ($select_stmt = $mysqli->prepare("UPDATE members SET last_notification_check = ? WHERE username = ?")) {
   $select_stmt->bind_param('ss', $current_datetime, $username);
   if ($select_stmt->execute()) {
      echo "Notifications cleared successfully";
   }
}

?>