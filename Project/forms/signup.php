<?php
$local = true;

$path = $_SERVER['DOCUMENT_ROOT'];

if ($local == false) {
    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
}

$docRoot = "http://". $_SERVER['HTTP_HOST'];

if ($local == false) {
    $docRoot = "http://". $_SERVER['HTTP_HOST']. "/~ics325su2115/";
}

$header = $path . '/includes/projectHeader.php';

include $header;

//var_dump($path);

require '../../database.php';
$db = NewConnection();


?>

<h1 style="text-align: center; font-size: 45px">Sign up</h1>
<br>

<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">

            <div class="form-group">
                <label for="email">Email:</label>
                <br>
                <input type="email" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <br>
                <input type="text" id="username" placeholder="Enter Username" name="username">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <br>
                <input type="password" id="pwd" placeholder="Enter password" name="password">
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name ='role'>
                    <option value="Adopter">Adopter</option>
<!--                    <option value="Employee">Employee</option>-->
<!--                    <option value="Admin">Admin</option>-->
                </select>
            </div>

            <button type="submit" style="background-color: rgba(27,255,20,0.6); width: 100%" id="createButton" name="signup"
                    class="btn btn-default">Create Account
            </button>


        </form>


        <br>
        <a href=" <?= $docRoot ?>/index.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>

<?php

$role = $_POST['role'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


//$sql = "INSERT INTO `user` (`username`, `email`,`password`, `role`, `last_login`, `active`)
//VALUES ('$username', '$email', '$password' ,'$role', '$last_login', $active)";

$sqlUser = "INSERT INTO `user` (`iduser`,`username`, `email`,`password`, `role`)
VALUES (NULL, '$username', '$email', '$password' ,'Adopter')";

//$findiduser = "Select iduser from user where `username` = '$username'";
//$results = $db->getArray($findiduser);
//$iduser = $results['iduser'];



if(isset($_POST['signup'])){
    $db->query($sqlUser);

}


?>


