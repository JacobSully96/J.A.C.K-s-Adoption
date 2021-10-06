<?php
session_start();
error_reporting(0);
?>

<?php
$local = true;

$path = $_SERVER['DOCUMENT_ROOT'];

$docRoot = "http://" . $_SERVER['HTTP_HOST'];

if ($local == false) {
    $docRoot = "http://" . $_SERVER['HTTP_HOST'] . "/~ics325su2115/";
}
//var_dump($local);
//var_dump($path);
?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>J.A.C.K Adoption</title>

    <link href="<?= $docRoot ?>/css/projectCSS.css" rel="stylesheet"/>
    <script src="<?= $docRoot ?>/js/javascript.js"></script>
    <!--    Bootstrap 5 CSS    -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<div id="header" class="header">
    <div class="row">

        <div class="col-10">
            <h1 style="text-align: center">J.A.C.K Adoption</h1>
        </div>

        <div class="col-2">
            <a href="<?= $docRoot ?>/Project/forms/login.php" role= 'button' class="btn btn-primary">Login</a>
            <a href="<?= $docRoot ?>/Project/profile.php" role= 'button' class="btn btn-info">Profile</a>
            <a href="<?= $docRoot ?>/Project/admin.php" role= 'button' class="btn btn-warning">Admin</a>


        </div>
    </div>
</div>


<!--<div id="header" class="header">-->
<!--    <div class="row">-->
<!---->
<!---->
<!--        <div class="col-10">-->
<!--            <h1 style="text-align: center">J.A.C.K Adoption</h1>-->
<!--                       <h2 id="subtitle" class="subtitle" style="text-align: left"></h2>-->
<!--        </div>-->
<!---->
<!--        <div class="col-1">-->
<!--            --><?php
//            if (isset($_SESSION['username'])) {
//            ?>
<!--            <form method="post">-->
<!--                <a href="--><?//= $docRoot ?><!--/index.php" role='button'>-->
<!--                    <button type="submit" class="btn btn-primary" id="logout" name='logout'>Logout-->
<!--                    </button>-->
<!--                </a>-->
<!---->
<!--                --><?php
//                } else { ?>
<!--                    <a href="--><?//= $docRoot ?><!--/Project/forms/login.php" role='button'-->
<!--                       class="btn btn-primary">Login</a>-->
<!--                    --><?php
//                }
//                ?>
<!---->
<!--                --><?php
//                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Student' || $_SESSION['role'] == 'Professor') {
//                ?>
<!--                <a href="--><?//= $docRoot ?><!--/Project/profile.php" role='button' class="btn btn-info">Profile</a>-->
<!--                --><?php
//                }
//                ?>
<!---->
<!--                --><?php
//                if ($_SESSION['role'] == 'Admin') {
//                    ?>
<!--                    <a href="--><?//= $docRoot ?><!--/Projects/Phase4/admin.php" role='button' class="btn btn-warning">Admin</a>-->
<!---->
<!--                    --><?php
//                }
//                ?>
<!--            </form>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<?php
//if (isset($_POST['logout'])) {
//    session_destroy();
//}
//
//?>


