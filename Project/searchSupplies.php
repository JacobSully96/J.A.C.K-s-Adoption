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
$searchSupplyName = "Select * FROM `supplyList` WHERE `supplyList`.`supplyName` LIKE '$search%'";
$searchSupplyType = "Select * FROM `supplyList` WHERE `supplyList`.`supplyType` LIKE '$search%'";
$searchAnimalType = "Select * FROM `supplyList` WHERE `supplyList`.`animalType` LIKE '$search%'";

$resultsSupplyListName = $db->query($searchSupplyName)->fetch_all(MYSQLI_ASSOC);
$resultsSupplyListType = $db->query($searchSupplyType)->fetch_all(MYSQLI_ASSOC);
$resultsAnimalType = $db->query($searchAnimalType)->fetch_all(MYSQLI_ASSOC);

?>

<h1 style="text-align: center; font-size: 45px">Supplies</h1>
<br>

<div class="container">

    <table id="supplyList" class="table table-striped">
        <thead style="text-align: center">
        <tr>
            <!--            <th>SupplyID</th>-->
            <th>Animal Type</th>
            <th>Supply Type</th>
            <th>Product Name</th>
            <th>Quantity (in Stock)</th>
            <th>Price Each</th>
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
            foreach ($resultsSupplyListName

            as $r) { ?>
        <tr>
            <!--            <td> --><?php //echo $r['idsupplyList']; ?><!--</td>-->
            <td> <?php echo $r['animalType']; ?></td>
            <td> <?php echo $r['supplyType']; ?></td>
            <td> <?php echo $r['supplyName']; ?></td>
            <td> <?php echo $r['qty']; ?></td>
            <td> $<?php echo $r['pricePerUnit']; ?></td>
            <?php
            if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                ?>
                <td><a href="/Project/forms/updateSupplyItem.php?editSupply=<?php echo $r['idsupplyList']; ?>">
                        <button class="btn btn-info" type="button">Edit</button>
                    </a></td>
                <td><a href="/Project/supplies.php?deleteSupply=<?php echo $r['idsupplyList']; ?>"
                       class="btn btn-danger">Delete</td>
                <?php
            }
            ?>


        </tr>

        <?php
        }

        ?>

        <?php
        foreach ($resultsSupplyListType

                 as $r) { ?>
            <tr>
                <!--            <td> --><?php //echo $r['idsupplyList']; ?><!--</td>-->
                <td> <?php echo $r['animalType']; ?></td>
                <td> <?php echo $r['supplyType']; ?></td>
                <td> <?php echo $r['supplyName']; ?></td>
                <td> <?php echo $r['qty']; ?></td>
                <td> $<?php echo $r['pricePerUnit']; ?></td>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <td><a href="/Project/forms/updateSupplyItem.php?editSupply=<?php echo $r['idsupplyList']; ?>">
                            <button class="btn btn-info" type="button">Edit</button>
                        </a></td>
                    <td><a href="/Project/supplies.php?deleteSupply=<?php echo $r['idsupplyList']; ?>"
                           class="btn btn-danger">Delete</td>
                    <?php
                }
                ?>

            </tr>

            <?php
        }

        ?>


        <?php
        foreach ($resultsAnimalType

                 as $r) { ?>
            <tr>
                <!--            <td> --><?php //echo $r['idsupplyList']; ?><!--</td>-->
                <td> <?php echo $r['animalType']; ?></td>
                <td> <?php echo $r['supplyType']; ?></td>
                <td> <?php echo $r['supplyName']; ?></td>
                <td> <?php echo $r['qty']; ?></td>
                <td> $<?php echo $r['pricePerUnit']; ?></td>
                <?php
                if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Employee') {
                    ?>
                    <td><a href="/Project/forms/updateSupplyItem.php?editSupply=<?php echo $r['idsupplyList']; ?>">
                            <button class="btn btn-info" type="button">Edit</button>
                        </a></td>
                    <td><a href="/Project/supplies.php?deleteSupply=<?php echo $r['idsupplyList']; ?>"
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

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $searchSupply = "Select * FROM `supplyList` WHERE `supplyList`.`supplyName` LIKE '$search%'";
    $db->query($searchSupply);
}


?>
