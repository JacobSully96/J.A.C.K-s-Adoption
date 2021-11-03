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
//include $menu;
//var_dump($path);
?>

<h1 style="text-align: center; font-size: 45px">Profile</h1>
<br>

<div class="container">

    This is a placeholder for the users profile


</div>





