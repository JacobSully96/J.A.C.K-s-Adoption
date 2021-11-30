<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';
$db = NewConnection();

$sqlDog = "select * from dog";
$sqlCat = "select * from cat";
$sqlBird = "select * from bird";

$resultsDog = $db->query($sqlDog)->fetch_all(MYSQLI_ASSOC);
$resultsCat = $db->query($sqlCat)->fetch_all(MYSQLI_ASSOC);
$resultsBird = $db->query($sqlBird)->fetch_all(MYSQLI_ASSOC);

?>

<h1 style="text-align: center; font-size: 45px">Add Animal</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">


            <div class="form-group">
                <label for="animalType">Animal:</label>
                <select id="animalType" name='animalType'>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                </select>
            </div>

            <div class="form-group">
                <label for="animalName">Animal Name:</label>
                <br>
                <input type="text" id="animal" placeholder="animal Name" name="animalName">
            </div>

            <div class="form-group">
                <label for="breed">Breed:</label>
                <br>
                <input type="text" id="Breed" placeholder="Breed" name="Breed">
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <br>
                <input type="text" id="weight" placeholder="weight" name="weight">
            </div>

            <div class="form-group">
                <label for="WingSpan">Wing Span (Inches) (Birds Only):</label>
                <br>
                <input type="text" id="WingSpan" placeholder="WingSpan" name="WingSpan">
            </div>

            <div class="form-group">
                <label for="birthdate">Birth Date:</label>
                <br>
                <input type="date" id="birthdate" name="birthdate">
            </div>

            <div class="form-group">
                Has animals been given shots/vaccinated?
                <br>
                <input type="radio" id="shots" name="shots" value="1">
                <label for="shots">Yes</label>
                <br>
                <input type="radio" id="shots" name="shots" value="0">
                <label for="shots">No</label>
            </div>

            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton"
                    name="addAnimal"
                    class="btn btn-default">Add Animal
            </button>

            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>


        <br>
        <a href="/Project/animals.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>

<?php

$animalType = $_POST['animalType'];
$name = $_POST['animalName'];
$breed = $_POST['Breed'];
$weight = $_POST['weight'];
$wingspan = $_POST['WingSpan'];
$DOB = $_POST['birthdate'];
$shots = $_POST['shots'];

if (isset($_POST['addAnimal'])) {
    if ($animalType == "Dog") {
        $sql = "INSERT INTO `dog`(`animalType`, `name`, `birthdate`, `breed`, `weight`, `shots`)
VALUES ('$animalType','$name','$DOB','$breed','$weight','$shots')";
        $db->query($sql);

    } else if ($animalType == "Cat") {
        $sql = "INSERT INTO `cat`(`animalType`, `name`, `birthdate`, `breed`, `weight`, `shots`)
VALUES ('$animalType','$name','$DOB','$breed','$weight','$shots')";
        $db->query($sql);

    } else if ($animalType == "Bird") {
        $sql = "INSERT INTO `bird`(`animalType`, `name`, `birthdate`, `breed`, `weight`, `wingspan`, `shots`)
VALUES ('$animalType','$name','$DOB','$breed','$weight', '$wingspan','$shots')";
        $db->query($sql);
    }

}

?>

