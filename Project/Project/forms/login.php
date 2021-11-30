<?php
$local = true;

$path = $_SERVER['DOCUMENT_ROOT'];

if ($local == false) {
    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
}

$docRoot = "http://" . $_SERVER['HTTP_HOST'];

if ($local == false) {
    $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2115/";
}

$header = $path . '/includes/projectHeader.php';

include $header;
require '../../database.php';

$db = NewConnection();

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
                <button type="submit" id="signIn" name="signIn" class="btn"
                        style="background-color: #00fafa; width: 100%">Sign in
                </button>
            </div>

        </form>


        <h3><b>New User?</b></h3>
        <a href=" <?= $docRoot ?>/Project/forms/signup.php">
            <button class="btn" id="signUp" style="background-color: rgba(165, 79, 255, 0.6);">Sign up</button>
        </a>
        <br>

        <a href=" <?= $docRoot ?>/index.php">
            <button class="btn" id="signUp" style="background-color: rgba(222,235,255,0.85);">Home</button>
        </a>
    </div>
</div>
<br>


<?php

if (isset($_POST['signIn'])) {

    $username = $_POST['username'];
    $pw = $_POST['password'];

    $sql = "Select * from `user` where username = '$username' AND password = '$pw'";
    $results = $db->query($sql)->fetch_array(MYSQLI_ASSOC);

    if ($username == $results['username'] && $pw == $results['password']) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $results['role'];
        echo "<h3 style='text-align: center; color: rgba(0,168,33,0.85)'> <b><i>Welcome $username!</i></b></h3>";
    } else {
        echo "<h3 style='text-align: center; color: rgba(255,0,11,0.85)'> <b><i>Error wrong username or password </i></b></h3>";
    }


}

?>
