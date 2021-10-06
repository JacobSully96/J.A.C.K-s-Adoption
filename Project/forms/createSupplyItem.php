<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;
?>

<h1 style="text-align: center; font-size: 45px">Create Supply Item</h1>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form method="post" class="form-horizontal">

            <div class="form-group">
                <label for="assignment">Supply Name:</label>
                <br>
                <input type="text" id="supply" placeholder="Supply Name" name="supply">
            </div>

            <div class="form-group">
                <label for="supply">Type:</label>
                <select id="supply" name ='supply'>
                    <option value="Food">Food</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Toy">Toy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="animal">Animal:</label>
                <select id="animal" name ='animal'>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                </select>
            </div>


            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="createButton" name="createSupply"
                    class="btn btn-default">Create Supply Item
</button>

            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>


        <br>
        <a href="/Project/supplies.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>
