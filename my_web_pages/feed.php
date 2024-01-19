<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="chrome.css">
    <link rel="stylesheet" href="style.css">
    <title>For you</title>
</head>
<body>
    <?php 
        require "header.php" 
    ?>
    <?php
    require_once("db_info.php");
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    require_once "db_connect.php";
    sec_session_start();
    if (login_check($mysqli)):
    ?>
        <main class="container-fluid p-2 mt-5 bg-white">
        <h1 class="fw-bolder border-bottom py-3">Posts</h1>
    <?php
        require_once("get_feed.php");
        $posts = get_posts_from_authors_id($_SESSION["user_id"]);
        foreach($posts as $post):
    ?>

        <article class="row border-bottom py-3">
            <div class="col-2 text-center">PH</div>
            <section class="col-10 d-grid gap-2">
                <a rel="author" href="" class="text-decoration-none text-reset fw-bold"><?php echo $post["username"]; ?></a>
                <p class="text-wrap">
                    <?php echo $post["body"]; ?>
                    <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium quam architecto quaerat amet obcaecati voluptatem nobis soluta magni libero ea nostrum eaque ducimus, distinctio natus adipisci modi neque blanditiis id! -->
                </p>
                <code class="d-block p-2 text-wrap">
                    <?php echo $post["code"]; ?>
                    <!-- print("hello world") -->
                    <!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum deserunt necessitatibus, quasi a quis perspiciatis impedit, consequuntur officiis accusamus, odio minima nesciunt vitae adipisci. Eligendi deserunt sit perspiciatis itaque quam. -->
                </code>
                <img src="./logo.jpg" alt="" class="w-25">
            </section>
        </article>
    </main>
    <?php
        endforeach;
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>