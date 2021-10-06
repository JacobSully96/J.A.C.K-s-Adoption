
<?php
$path = $_SERVER['DOCUMENT_ROOT'];

$local = true;

$docRoot = "http://" . $_SERVER['HTTP_HOST'];

if ($local == false) {
    $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2115/";
}
////var_dump($local);
////var_dump($path);
//?>

<ul id="navBar">
    <li><a href="<?= $docRoot ?>/Project/home.php">Home</a></li>
    <li><a href="<?= $docRoot ?>/Project/forms/survey.php">Survey</a></li>
    <li><a href="<?= $docRoot ?>/Project/animals.php">Animals</a></li>
    <li><a href="<?= $docRoot ?>/Project/supplies.php">Supplies</a></li>


</ul>

<!--<ul id="navBar">-->
<!--    --><?php
//    if (isset($_SESSION['username'])){
//    ?>
<!--    <li><a href="--><?//= $docRoot ?><!--/Projects/Phase4/home.php">Home</a></li>-->
<!--    --><?php
//    if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Professor') {
//        ?>
<!--        <li><a href="--><?//= $docRoot ?><!--/Projects/Phase4/gradebook.php">GradeBook</a></li>-->
<!--        --><?php
//    } else {
//        echo "";
//    }
//    ?>
<!--    <li><a href="--><?//= $docRoot ?><!--/Projects/Phase4/classes.php">Classes</a></li>-->
<!--    <li><a href="--><?//= $docRoot ?><!--/Projects/Phase4/sessions.php">Sessions</a></li>-->
<!--    <li><a href="--><?//= $docRoot ?><!--/Projects/Phase4/assignments.php">Assignments</a></li>-->
<!--</ul>-->
<?php
//}
//?>


