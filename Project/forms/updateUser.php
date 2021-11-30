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
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';

$db = NewConnection();

$id = $_GET['updateUser'];
$sql = "Select * from user where iduser= '$id'";

$current = $db->query($sql)->fetch_array(MYSQLI_ASSOC);

$role = $current['role'];
$username = $current['username'];
$email = $current['email'];
$password = $current['password'];

?>

<h1 style="text-align: center; font-size: 45px">Update User</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <form method="POST" class="form-horizontal">

                    <div class="form-group">
                        <label for="role" >Role:</label>
                        <select id="role" name ='role' >
                            <option value="Adopter">Adopter</option>
                            <option value="Employee">Employee</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="username">User Name:</label>
                        <br>
                        <input type="text" id="username" placeholder="User Name" name="username" value= "<?php echo $username?>">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <br>
                        <input type="text" id="Email" placeholder="Email" name="Email" value= "<?php echo $email?>">
                    </div>

                    <div class="form-group">
                        <label for="password">password:</label>
                        <br>
                        <input type="text" id="password" placeholder="password" name="password" value= "<?php echo $password?>">
                    </div>


                    <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createUserButton" name="updateUser"
                            class="btn btn-default">Update User
                    </button>

                    <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

                </form>

        <a href="../animals.php">
            <button style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton" name="cancel" >Cancel
            </button>
        </a>

    </div>

</div>


<?php


if(isset($_POST['updateUser'])) {

    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $update = "UPDATE `user` SET `username`='$username', `email`='$email',`password`='$password',`role`='$role'
    WHERE `user`.`iduser` = '$id'";

    $db->query($update);

}

?>







