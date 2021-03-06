<?php
$local = true;

$path = $_SERVER['DOCUMENT_ROOT'];

if ($local == false) {
    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
}

$docRoot = "http://". $_SERVER['HTTP_HOST'];

if ($local == false) {
    $docRoot = "http://". $_SERVER['HTTP_HOST']. "/~ics325su2115/";
}

$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';


$db = NewConnection();

$id = $_GET['editBird'];
$sql = "Select * from bird where idbird= '$id'";

$current = $db->query($sql)->fetch_array(MYSQLI_ASSOC);

$name = $current['name'];
$breed = $current['breed'];
$weight = $current['weight'];
$wingspan = $current['wingspan'];
$DOB = $current['birthdate'];


?>

<h1 style="text-align: center; font-size: 45px">Update Bird</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">


            <div class="form-group">
                <label for="animalType">Animal:</label>
                <select id="animalType" name ='animalType'>
                    <option value="Bird">Bird</option>
                    <!--                    <option value="Cat">Cat</option>-->
                    <!--                    <option value="Bird">Bird</option>-->
                </select>
            </div>

            <div class="form-group">
                <label for="animalName">Bird Name:</label>
                <br>
                <input type="text" id="animal"  value= "<?php echo $name?>" placeholder="<?php echo $name?>" name="animalName">
            </div>

            <div class="form-group">
                <label for="breed">Breed:</label>
                <br>
                <input type="text" id="Breed" value= "<?php echo $breed?>" placeholder="<?php echo $breed?>"  name="Breed">
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <br>
                <input type="text" id="weight" placeholder="weight" value= "<?php echo $weight?>" name="weight">
            </div>

            <div class="form-group">
                <label for="WingSpan">Wing Span (Inches):</label>
                <br>
                <input type="text" id="WingSpan" placeholder="<?php echo $wingspan?>" value= "<?php echo $wingspan?>" name="WingSpan">
            </div>

            <div class="form-group">
                <label for="birthdate">Birth Date:</label>
                <br>
                <input type="date" id="birthdate" value= "<?php echo $DOB?>" name="birthdate">
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

            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton" name="updateBird"
                    class="btn btn-default">Update Bird
            </button>

            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>

        <a href="../animals.php">
            <button style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton" name="cancel" >Cancel
            </button>
        </a>

    </div>

</div>


<?php


if(isset($_POST['updateBird'])) {

    $name = $_POST['animalName'];
    $breed = $_POST['Breed'];
    $weight = $_POST['weight'];
    $wingspan = $_POST['WingSpan'];
    $DOB = $_POST['birthdate'];
    $shots = $_POST['shots'];

    $update = "UPDATE `Bird` SET `name`='$name',`birthdate`='$DOB',`breed`='$breed',`weight`='$weight', `wingspan`='$wingspan',`shots`='$shots'
    WHERE `Bird`.`idBird` = '$id'";

    $db->query($update);

}

?>
