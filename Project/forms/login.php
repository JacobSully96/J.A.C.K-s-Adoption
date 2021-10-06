
<?php
$local = true;

$path = $_SERVER['DOCUMENT_ROOT'];

$header = $path . '/includes/projectHeader.php';

include $header;

?>

<h1 style="text-align: center"> Login</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post">

            <div class="form-group">
                <label for="username">Username:</label>
                <br>
                <input type="text" placeholder="Username" name="username" required>
            </div>


            <div class="form-group">
                <label for="password">Password:</label>
                <br>
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit" id="signIn" name = "signIn" class="btn" style="background-color: #00fafa; width: 100%">Sign in
                </button>
            </div>

        </form>


        <h3><b>New User?</b></h3>
        <a href="/Project/forms/signup.php">
            <button class="btn" id="signUp" style="background-color: rgba(165, 79, 255, 0.6);">Sign up</button>
        </a>
        <br>

        <a href="/index.php">
            <button class="btn" id="signUp" style="background-color: rgba(222,235,255,0.85);">Home</button>
        </a>
    </div>
</div>
<br>

