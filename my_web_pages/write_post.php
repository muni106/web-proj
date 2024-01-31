<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/chrome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/write.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>Write post</title>
</head>
<body>
    <?php
        require_once("db_info.php");
        $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
        require_once("db_connect.php");
        sec_session_start();
        require_once("get_user_info.php");
        $user_info = get_user_info($_SESSION["user_id"]); 
    ?>
    <?php require("headerProfile.php") ?>
    <main class="m-2">
        <h1 class="fw-bolder py-3 d-inline col-10">Write a post</h1>
        <form action="./process_write_post.php" method="post" enctype="multipart/form-data" class="d-grid gap-4 my-2">
            <fieldset class="textContainer">
                <a href="">
                    <img src="show_image.php?image=<?php echo($user_info["profile_image_path"]); ?>" alt="profile image" id="profileImage" >
                </a> 
                <label for="text" class="d-none">Write the main content here</label>
                <textarea type="text" name="text" id="text" id="postDescription" placeholder="Write something" class="border-0 align-middle col-10 d-inline w-75 p-2"></textarea>
            </fieldset>
            <fieldset class="d-flex justify-content-center">
                <label for="code" class="d-none">Insert your code here:</label>
                <textarea name="code" id="code" cols="30" rows="5" placeholder="Insert your code" class="font-monospace rounded-0 text-dark bg-secondary p-1">print("Hello World!")</textarea>
            </fieldset>
            <fieldset>
                <label for="image" class="form-label">Load your image here</label>
                <input name="image" id="image" type="file" class="form-control rounded-0"  />
            </fieldset>
            <input type="hidden" name="current_datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <fieldset class="d-flex justify-content-center">
                <label for="publish" class="d-none">Publish this post</label>
                <input type="hidden" name="reply" value="<?php echo $_GET["reply"] ?>">
                <input type="submit" value="Publish" id="publish" class="btn block-btn text-white fw-bold rounded-pill d-block w-75"/>
            </fieldset>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>