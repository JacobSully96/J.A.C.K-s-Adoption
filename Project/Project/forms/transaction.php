<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../../database.php';

$db = NewConnection();



?>

<h1 style="text-align: center; font-size: 45px">Your Cart</h1>
<br>

<div class="container">


</div>


<?php


?>
