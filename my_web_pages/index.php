<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"\>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Petris</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/landing.css">
</head>
<body>
    <?php
        require_once("db_connect.php");
        sec_session_start();
        if(login_check($mysqli)) {
            header('Location: feed.php', true, 303);
            die();
        }
    ?>
    <header class="mb-4">
        <img src="./assets/images/logo.png" alt="logo" />
    </header>
    <main>
        <h1 class="fw-bolder display-1 mb-5">Welcome to Petris</h1>
        <section class="mb-5 ">
            <h2 class="fw-bold mb-3">Join now</h2>
            <a href="signup.php" class="btn d-flex justify-content-center fw-bold rounded-pill mx-3">Sign up</a>
        </section>
        <section class="mb-5">
            <h2 class="fw-bold mb-3">Already have an account?</h2>
            <a href="login.php" class="btn d-flex justify-content-center fw-bold rounded-pill mx-3">Sign in</a>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>