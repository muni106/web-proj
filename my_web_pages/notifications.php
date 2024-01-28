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
    <title>Notifications</title>
</head>
<body>
    <?php 
        require "header.php" 
    ?>
    <?php
        if (login_check($mysqli)):
    ?>
        <main class="container p-2 mt-3 bg-white">
        <h1 class="fw-bolder border-bottom py-3">Notifications</h1>
    <?php
        require_once("get_feed.php");
        $posts = get_feed_from_user_id($_SESSION["user_id"]);
        require_once("show_posts.php");
        function get_last_notification_check(int $id): string {
            $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
            $stmt = $mysqli->prepare(
                "SELECT last_notification_check FROM members WHERE id = ?"
            );
            $stmt->bind_param('i', $id);
            $stmt->execute(); // esegue la query appena creata.
            $stmt->store_result();
            $stmt->bind_result($result); // recupera il risultato della query e lo memorizza nelle relative variabili.
            $stmt->fetch();
            return $result;
        };
        $last_check = new Datetime(get_last_notification_check($_SESSION["user_id"]));
        $condition = function($value) {
            $post_datetime = new Datetime($value["datetime"]);
            global $last_check;
            return $post_datetime > $last_check;
        };
        $filtered_posts = array_filter($posts, $condition); 
        show_posts($filtered_posts);
    ?>

    <form action="process_notifications.php" method="post" name="clear_notifications" class="d-grid gap-4 d-block p-3">
        <fieldset>
            <input type="hidden" name="current_datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </fieldset>

        <input type="submit" value="Clear notifications" onclick="" class="btn bg-black block-btn text-white fw-bold rounded-pill d-block mx-3" />
    </form>
        </main>
    <?php
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>