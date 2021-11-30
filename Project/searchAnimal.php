<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../database.php';

$db = NewConnection();

$search = $_GET['search'];
$searchDog = "Select * FROM `dog` WHERE `dog`.`name` LIKE '$search%'";
$searchCat = "Select * FROM `cat` WHERE `cat`.`name` LIKE '$search%';";
$searchBird = "Select * FROM `bird` WHERE `bird`.`name` LIKE '$search%'";

$resultsDog = $db->query($searchDog)->fetch_all(MYSQLI_ASSOC);
$resultsCat = $db->query($searchCat)->fetch_all(MYSQLI_ASSOC);
$resultsBird = $db->query($searchBird)->fetch_all(MYSQLI_ASSOC);


?>

<h1 style="text-align: center; font-size: 45px">Available Animals</h1>
<br>

<div class="container">

    <table id="dogs" class="table table-striped">
        <thead style="text-align: center">
        <tr>
            <th>Animal Name</th>
            <th>Animal Type</th>
            <th>Breed</th>
            <th>Birthday</th>
            <th>weight (Lbs)</th>
            <th>wingspan (Inches)</th>
            <th>Shots</th>
            <th></th>

        </tr>
        </thead>

        <tbody>

        <?php
        foreach ($resultsDog

                 as $r) { ?>
            <tr>
                <td> <?php echo $r['name']; ?></td>
                <td> <?php echo $r['animalType']; ?></td>
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
                if ($_SESSION['role'] == 'Adopter') {
                    ?>
                    <td><a href="/Project/forms/adoptionForm.php?adoptDog=<?php echo $r['iddog']; ?>"
                           onclick="return confirm('Are you sure you want to adopt this pet?');"
                           class="btn btn-info">Adopt</td>
                    <?php
                }
                ?>

            </tr>

            <?php
        }
        ?>

        <tr>

            <?php
            foreach ($resultsCat

            as $r) { ?>
            <td> <?php echo $r['name']; ?></td>
            <td> <?php echo $r['animalType']; ?></td>
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
            if ($_SESSION['role'] == 'Adopter') {
                ?>
                <td><a href="/Project/forms/adoptionForm.php?adoptCat=<?php echo $r['idcat']; ?>"
                       onclick="return confirm('Are you sure you want to adopt this pet?');"
                       class="btn btn-info">Adopt</td>
                <?php
            }
            ?>

        </tr>

        <?php
        }

        ?>

        <tr>

            <?php
            foreach ($resultsBird

            as $r) { ?>
            <tr>
                <td> <?php echo $r['name']; ?></td>
                <td> <?php echo $r['animalType']; ?></td>
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
                if ($_SESSION['role'] == 'Adopter') {
                    ?>
                    <td><a href="/Project/forms/adoptionForm.php?adoptBird=<?php echo $r['idbird']; ?>"
                           onclick="return confirm('Are you sure you want to adopt this pet?');"
                           class="btn btn-info">Adopt</td>
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

?>
