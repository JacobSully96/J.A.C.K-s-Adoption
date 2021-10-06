<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;
?>

<h1 style="text-align: center; font-size: 45px">Add Animal</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">
            

            <div class="form-group">
                <label for="animal">Animal:</label>
                <select id="animal" name ='animal'>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                </select>
            </div>

            <div class="form-group">
                <label for="assignment">Animal Name:</label>
                <br>
                <input type="text" id="animal" placeholder="animal Name" name="animal">
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
                <label for="birthdate">Birth Date:</label>
                <br>
                <input type="date" id="birthdate" name="birthdate">
            </div>

            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton" name="addAnimal"
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

