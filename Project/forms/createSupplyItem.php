<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';
$db = NewConnection();

$currentSuppliesSql = "select * from supplyList";

$currentSupplies = $db->query($currentSuppliesSql)->fetch_all(MYSQLI_ASSOC);


?>

<h1 style="text-align: center; font-size: 45px">Create Supply Item</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">

            <div class="form-group">
                <label for="supplyName">Supply Name:</label>
                <br>
                <input type="text" id="supply" placeholder="Supply Name" name="supplyName">
            </div>

            <div class="form-group">
                <label for="supplyType">Type:</label>
                <select id="supplyType" name ='supplyType'>
                    <option value="Food">Food</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Toy">Toy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="animalType">Animal:</label>
                <select id="animalType" name ='animalType'>
                    <option value="K-9">Dog</option>
                    <option value="Feline">Cat</option>
                    <option value="Aves">Bird</option>
                </select>
            </div>

            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="quantity">
            </div>

            <div class="form-group">
                <label for="price">Price Each:</label>
                <input type="number" id="price" name="price" value="price">
            </div>

            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton" name="createSupply"
                    class="btn btn-default">Create Supply Item
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
$name = $_POST['supplyName'];
$supplyType = $_POST["supplyType"];
$animalType = $_POST['animalType'];
$qty = $_POST['quantity'];
$priceEach = $_POST['price'];

//$sql = "INSERT INTO `supplylist`( `idsupplyList`,`animalType`, `supplyType`, `supplyName`, `qty`, `pricePerUnit`)
//VALUES (NULL, '$animalType', '$supplyType', '$name', '$qty', '$priceEach')";
//
//if(isset($_POST['createSupply'])){
//    $db->query($sql);
//}

$duplicateCount = 0;

foreach ($currentSupplies as $cs){

    if($animalType == $cs['animalType'] && $supplyType == $cs['supplyType'] &&
        $name == $cs['supplyName'] && $qty == $cs['qty'] &&
        $priceEach == $cs['pricePerUnit']){

        $duplicateCount++;
        echo "<h2 style='text-align: center; color: rgba(255,0,11,0.85)'><b>Exact entry already exists</b></h2>";
    }
}

if($duplicateCount == 0){
    $sql = "INSERT INTO `supplylist`( `idsupplyList`,`animalType`, `supplyType`, `supplyName`, `qty`, `pricePerUnit`) 
VALUES (NULL, '$animalType', '$supplyType', '$name', '$qty', '$priceEach')";

    if(isset($_POST['createSupply'])){
        $db->query($sql);
    }
}


?>
