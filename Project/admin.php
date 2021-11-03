<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require_once '../database.php';

$db = NewConnection();

$sqlUser = "select * from `user`";

$sqlResultsUser = $db->query($sqlUser)->fetch_all(MYSQLI_ASSOC);

?>

<h1 style="text-align: center; font-size: 45px">Admin Page</h1>
<br>


<div class="container">

    <div style="text-align: center">
        <a href="/Project/forms/createUser.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create User</button>
        </a>
        <a href="/Project/forms/addAnimal.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Add Animal</button>
        </a>
        <a href="/Project/forms/createSupplyItem.php">
            <button class="btn btn-primary" type="button" style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create Supply Item</button>
        </a>

    </div>

</div>
<br>

<div class="container">

    <table id="users" class="table table-striped">
        <thead style="text-align: center">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
        </thead>

        <tbody>
        <tr>

            <?php
            foreach ($sqlResultsUser

            as $r) { ?>
        <tr>
            <td> <?php echo $r['iduser']; ?></td>
            <td> <?php echo $r['username']; ?></td>
            <td> <?php echo $r['email']; ?></td>
            <td> <?php echo $r['password']; ?></td>
            <td> <?php echo $r['role']; ?></td>
        </tr>

        <?php
        }

        ?>

        </tbody>
    </table>
</div>

