<?php


$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;
//include $menu;
//var_dump($path);

require '../../database.php';
$db = NewConnection();

$currentUserSql = "select * from user";

$currentUser = $db->query($currentUserSql)->fetch_all(MYSQLI_ASSOC);

?>

<h1 style="text-align: center; font-size: 45px">Create User</h1>

<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="POST" class="form-horizontal">

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name ='role'>
                    <option value="Adopter">Adopter</option>
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="username">User Name:</label>
                <br>
                <input type="text" id="username" placeholder="User Name" name="username">
            </div>

            <div class="form-group">
                <label for="Email">Email:</label>
                <br>
                <input type="text" id="Email" placeholder="Email" name="Email">
            </div>

            <div class="form-group">
                <label for="password">password:</label>
                <br>
                <input type="text" id="password" placeholder="password" name="password">
            </div>


            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createUserButton" name="createUser"
                    class="btn btn-default">Create User
            </button>

            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>


        <br>
        <a href="/Project/home.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>

<?php

$role = $_POST['role'];
$username = $_POST['username'];
$email = $_POST['Email'];
$password = $_POST['password'];

//$sql = "INSERT INTO `user` (`username`, `email`,`password`, `role`)
//VALUES ('$username', '$email', '$password' ,'$role')";
//
//
//if(isset($_POST['createUser'])){
//    $db->query($sql);
//}

$duplicateCount = 0;

foreach ($currentUser as $cs){

    if($role == $cs['role'] && $username == $cs['username'] &&
        $email == $cs['email'] ){

        $duplicateCount++;
        echo "<h2 style='text-align: center; color: rgba(255,0,11,0.85)'><b>User already exists</b></h2>";
    }
}

if($duplicateCount == 0){
    $sql = "INSERT INTO `user` (`username`, `email`,`password`, `role`) 
VALUES ('$username', '$email', '$password' ,'$role')";

    if(isset($_POST['createUser'])){
        $db->query($sql);
    }
}

?>