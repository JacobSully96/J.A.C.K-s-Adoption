<?php
//$local = true;
//
//$path = $_SERVER['DOCUMENT_ROOT'];
//
//if ($local == false) {
//    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
//}
//
//$docRoot = "http://". $_SERVER['HTTP_HOST'];
//
//if ($local == false) {
//    $docRoot = "http://". $_SERVER['HTTP_HOST']. "/~ics325su2115/";
//}
//
//$header = $path . '/includes/header.php';
//$menu = $path . '/includes/menu.php';
//include $header;
//include $menu;
////var_dump($path);
//?>
<!---->
<!--<h1>Phase 4 Final Implementation</h1>-->
<!--<div class="websiteButton">-->
<!--    <a href=" --><?//= $docRoot ?><!--/Projects/Phase4/home.php"><h1><b> Grade Book Website </b></h1>-->
<!--    </a>-->
<!--</div>-->
<!---->
<?php
//$footer = $path . "/includes/footer.php";
//include $footer;
//?>

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
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

//if(isset($_SESSION['username'])) {
//    include $navBar;
//}

//echo $_SESSION['username'];
//echo '<br>';

//if (!isset($_SESSION['username'])) {
//    echo "<h2 style='text-align: center'> PLEASE LOGIN </h2>";
//} else {
//    echo "<p style='text-align: center'> You are logged in as " . $_SESSION['username'] . "</p>";
//}

?>

<h1 style="text-align: center; font-size: 45px;"><b>Welcome to the J.A.C.K's Adoption Agency</b></h1>
<br>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">

        <img src="<?= $docRoot ?>/images/adoptLogo.jpg" width="1000" height="500">

    </div>
</div>


<?php
//$footer = $path . "/includes/projectFooter.php";
//include $footer;
?>


