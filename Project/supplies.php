<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../database.php';

$db = NewConnection();

$sqlSupplyList = "select * from supplyList";

$resultsSupplyList = $db->query($sqlSupplyList)->fetch_all(MYSQLI_ASSOC);

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
            foreach ($resultsSupplyList

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

if (isset($_GET['deleteSupply'])) {
    $id = $_GET['deleteSupply'];
    $delBird = "DELETE FROM `supplyList` WHERE `supplyList`.`idsupplyList` = '$id'";
    $db->query($delBird);
}



?>