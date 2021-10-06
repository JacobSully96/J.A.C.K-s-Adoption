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

<h1 style="text-align: center; font-size: 45px">Admin Page</h1>
<br>


<div class="container">

    <div style="text-align: center">
        <a href="/Project/forms/createUser.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create User</button>
        </a>
        <a href="/Project/forms/addAnimal.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Add Animal</button>
        </a>
        <a href="/Project/forms/createSupplyItem.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create Supply Item</button>
        </a>


    </div>

</div>


<?php
//$footer = $path . "/includes/projectFooter.php";
//include $footer;
?>
