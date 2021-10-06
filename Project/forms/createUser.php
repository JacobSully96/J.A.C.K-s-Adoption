<?php


$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;
//include $menu;
//var_dump($path);

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
        <a href=" <?= $docRoot ?>/Project/home.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>
