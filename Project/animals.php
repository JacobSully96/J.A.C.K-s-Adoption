<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../database.php';

$db = NewConnection();

$sqlDog = "select * from dog";
$sqlCat = "select * from cat";
$sqlBird = "select * from bird";

$resultsDog = $db->query($sqlDog)->fetch_all(MYSQLI_ASSOC);
$resultsCat = $db->query($sqlCat)->fetch_all(MYSQLI_ASSOC);
$resultsBird = $db->query($sqlBird)->fetch_all(MYSQLI_ASSOC);

?>

    <h1 style="text-align: center; font-size: 45px">Available Animals</h1>
    <br>

    <div class="container">

        <table id="dogs" class="table table-striped">
            <thead style="text-align: center">
            <tr>
                <th>Dog Name</th>
                <th>Breed</th>
                <th>Birthday</th>
                <th>weight (Lbs)</th>
                <th>Shots</th>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <th></th>
                    <th></th>
                    <?php
                }
                ?>
            </tr>
            </thead>

            <tbody>
            <tr>

                <?php
                foreach ($resultsDog

                as $r) { ?>
            <tr>
                <td> <?php echo $r['name']; ?></td>
                <td> <?php echo $r['breed']; ?></td>
                <td> <?php echo $r['birthdate']; ?></td>
                <td> <?php echo $r['weight']; ?></td>
                <td> <?php
                    if ($r['shots'] == 1) {
                        echo "Yes";
                    } else {
                        echo "No";
                    }
                    ?></td>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <td><a href="/Project/forms/updateDog.php?editDog=<?php echo $r['iddog']; ?>">
                            <button class="btn btn-info" type="button">Edit</button>
                        </a></td>
                    <td><a href="/Project/animals.php?deleteDog=<?php echo $r['iddog']; ?>"
                           class="btn btn-danger">Delete</td>
                    <?php
                }
                ?>

            </tr>

            <?php
            }

            ?>

            </tbody>
        </table>

        <br>

        <table id="cats" class="table table-striped">
            <thead style="text-align: center">
            <tr>
                <th>Cat Name</th>
                <th>Breed</th>
                <th>Birthday</th>
                <th>weight (Lbs)</th>
                <th>Shots</th>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <th></th>
                    <th></th>
                    <?php
                }
                ?>
            </tr>
            </thead>

            <tbody>
            <tr>

                <?php
                foreach ($resultsCat

                as $r) { ?>
            <tr>
                <td> <?php echo $r['name']; ?></td>
                <td> <?php echo $r['breed']; ?></td>
                <td> <?php echo $r['birthdate']; ?></td>
                <td> <?php echo $r['weight']; ?></td>
                <td> <?php
                    if ($r['shots'] == 1) {
                        echo "Yes";
                    } else {
                        echo "No";
                    }
                    ?></td>

                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <td><a href="/Project/forms/updateCat.php?editCat=<?php echo $r['idcat']; ?>">
                            <button class="btn btn-info" type="button">Edit</button>
                        </a></td>
                    <td><a href="/Project/animals.php?deleteCat=<?php echo $r['idcat']; ?>"
                           class="btn btn-danger">Delete</td>
                    <?php
                }
                ?>
            </tr>

            <?php
            }

            ?>

            </tbody>
        </table>

        <br>

        <table id="birds" class="table table-striped">
            <thead style="text-align: center">
            <tr>

                <th>Bird Name</th>
                <th>Breed</th>
                <th>Birthday</th>
                <th>weight (Lbs)</th>
                <th>wingspan (Inches)</th>
                <th>Shots</th>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <th></th>
                    <th></th>
                    <?php
                }
                ?>
            </tr>
            </thead>

            <tbody>
            <tr>

                <?php
                foreach ($resultsBird

                as $r) { ?>
            <tr>
                <td> <?php echo $r['name']; ?></td>
                <td> <?php echo $r['breed']; ?></td>
                <td> <?php echo $r['birthdate']; ?></td>
                <td> <?php echo $r['weight']; ?></td>
                <td> <?php echo $r['wingspan']; ?></td>
                <td> <?php
                    if ($r['shots'] == 1) {
                        echo "Yes";
                    } else {
                        echo "No";
                    }
                    ?></td>

                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <td><a href="/Project/forms/updateBird.php?editBird=<?php echo $r['idbird']; ?>">
                            <button class="btn btn-info" type="button">Edit</button>
                        </a></td>
                    <td><a href="/Project/animals.php?deleteBird=<?php echo $r['idbird']; ?>"
                           class="btn btn-danger">Delete</td>
                    <?php
                }
                ?>


            </tr>

            <?php
            }

            ?>

            </tbody>
        </table>


    </div>

<?php

if (isset($_GET['deleteBird'])) {
    $id = $_GET['deleteBird'];
    $delBird = "DELETE FROM `bird` WHERE `bird`.`idbird` = '$id'";
    $db->query($delBird);
}

if (isset($_GET['deleteCat'])) {
    $id = $_GET['deleteCat'];
    $delCat = "DELETE FROM `cat` WHERE `cat`.`idcat` = '$id'";
    $db->query($delCat);
}

if (isset($_GET['deleteDog'])) {
    $id = $_GET['deleteDog'];
    $delDog = "DELETE FROM `dog` WHERE `dog`.`iddog` = '$id'";;
    $db->query($delDog);
}

?>