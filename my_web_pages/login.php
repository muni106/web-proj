<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Log into SocialName</title>
</head>
<body>
    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
    <?php
    if(isset($_GET['error'])) { 
        echo 'Error Logging In!';
    }
    ?>
    <header class="d-flex justify-content-center">
        <img src="./logo.jpg" alt="SocialName" class="w-25"/>
    </header>
    <main>
        <h1 class="fw-bolder my-5">Sign in to SocialName</h1>
        <form action="process_login.php" method="post" name="login_form" class="d-grid gap-4 d-block">
            <fieldset class="form-floating">
                <input type="text" id="email" name="email" placeholder="email" class="form-control border border-dark border-3 rounded-0" />
                <label for="email" class="text-secondary">Email</label>
            </fieldset>
            
            <fieldset class="form-floating">
                <input type="password" id="password" name="password" placeholder="password" class="form-control border border-dark border-3 rounded-0" />
                <label for="password" class="text-secondary">Password</label>
            </fieldset>
            <input type="button" value="Log in" onclick="formhash(this.form, this.form.password);" class="btn bg-black block-btn text-white fw-bold rounded-pill d-block mx-3" />
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>