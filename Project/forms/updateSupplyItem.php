<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';
$db = NewConnection();

$id = $_GET['editSupply'];
$sql = "Select * from supplyList where idsupplyList= '$id'";

$current = $db->query($sql)->fetch_array(MYSQLI_ASSOC);

$name = $current['supplyName'];
$supplyType = $current['supplyType'];
$animalType = $current['animalType'];
$qty = $current['qty'];
$price = $current['pricePerUnit'];

?>

    <h1 style="text-align: center; font-size: 45px">Update Supply Item</h1>


    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <form method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="supplyName">Supply Name:</label>
                    <br>
                    <input type="text" id="supply" value="<?php echo $name ?>" placeholder="<?php echo $name ?>"
                           name="supplyName">
                </div>

                <div class="form-group">
                    <label for="supplyType">Type:</label>
                    <select id="supplyType" name='supplyType'>
                        <option value="Food">Food</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Toy">Toy</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="animalType">Animal:</label>
                    <select id="animalType" name='animalType'>
                        <option value="K-9">Dog</option>
                        <option value="Feline">Cat</option>
                        <option value="Aves">Bird</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="qty">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="<?php echo $qty ?>"
                           placeholder="<?php echo $qty ?>">
                </div>

                <div class="form-group">
                    <label for="price">Price Each:</label>
                    <input type="number" id="price" name="price" value="<?php echo $price ?>"
                           placeholder="<?php echo $price ?>">
                </div>

                <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton"
                        name="editSupply"
                        class="btn btn-default">Update Supply Item
                </button>

            </form>


            <br>
            <a href="/Project/supplies.php" class="login">
                <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
                </button>
            </a>

        </div>
    </div>

<?php

if (isset($_POST['editSupply'])) {

    $name = $_POST['supplyName'];
    $supplyType = $_POST['supplyType'];
    $animalType = $_POST['animalType'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];

    $update = "UPDATE `supplylist` SET `animalType`= '$animalType',`supplyType`= '$supplyType',`supplyName`= '$name',`qty`= '$qty',`pricePerUnit`= '$price' 
WHERE `supplyList`.`idsupplyList`= '$id'";

    $db->query($update);

}

?>