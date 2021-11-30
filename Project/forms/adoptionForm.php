<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../../database.php';

$db = NewConnection();

$idDog = $_GET['adoptDog'];
$idCat = $_GET['adoptCat'];
$idBird = $_GET['adoptBird'];


$sqlDog = "select * from `dog` where iddog = '$idDog'";
$sqlCat = "select * from `cat` where idcat = '$idCat'";
$sqlBird = "select * from `bird` where idbird = '$idBird'";

$resultsDog = $db->query($sqlDog)->fetch_array(MYSQLI_ASSOC);
$resultsCat = $db->query($sqlCat)->fetch_array(MYSQLI_ASSOC);
$resultsBird = $db->query($sqlBird)->fetch_array(MYSQLI_ASSOC);

$dogName = $resultsDog['name'];
$catName = $resultsCat['name'];
$birdName = $resultsBird['name'];

?>

<h1 style="text-align: center; font-size: 45px">Adoption Form</h1>
<br>

<div class="container">

    <div class="d-flex flex-column justify-content-center align-items-center">
        <p>Current Animal Selected for Adoption: <b><h3> <?php echo $dogName; ?> <?php echo $catName; ?> <?php echo $birdName; ?></h3></b></p>
        <form method="POST" class="form-horizontal">


            <div class="form-group">
                <label for="username">Username:</label>
                <br>
                <input type="text" placeholder="Username" name="username" required>
            </div>

<!--            <div class="form-group">-->
<!--                <label for="email">Email:</label>-->
<!--                <br>-->
<!--                <input type="text" placeholder="Email" name="email" required>-->
<!--            </div>-->


            <div class="form-group">
                <label for="password">Password:</label>
                <br>
                <input type="password" placeholder="Password" name="password" required>
            </div>


            <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="confirmAdoption" name="confirmAdoption"
                    class="btn btn-default">Confirm Adoption
            </button>

            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>


        <br>
        <a href="/Project/home.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>

</div>

<?php

if (isset($_POST['confirmAdoption'])) {

$username = $_POST['username'];
$pw = $_POST['password'];

$sql = "Select * from `user` where username = '$username' AND password = '$pw'";
$results = $db->query($sql)->fetch_array(MYSQLI_ASSOC);

if ($username == $results['username'] && $pw == $results['password']) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $results['role'];
    echo "<h3 style='text-align: center; color: rgba(0,168,33,0.85)'> <b><i>Congrats! You've adopted  $dogName $catName $birdName!</i></b></h3>";

    $updateDogStatus = "update dog set adoptedStatus = true where iddog = '$idDog'";
    $updateCatStatus = "update cat set adoptedStatus = true where idcat = '$idCat'";
    $updateBirdStatus = "update dog set adoptedStatus = true where idbird = '$idBird'";

    $db->query($updateDogStatus);
    $db->query($updateCatStatus);
    $db->query($updateBirdStatus);

} else {
    echo "<h3 style='text-align: center; color: rgba(255,0,11,0.85)'> <b><i>Error wrong username, password or email </i></b></h3>";
}


}

?>
