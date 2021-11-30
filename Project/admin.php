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

$sqlUser = "select * from `user`";
$searchUser = "Select * FROM `user` WHERE `user`.`username` LIKE '$search%'";
//$searchEmail = "Select * FROM `user` WHERE `user`.`email` LIKE '$search%'";

$sqlResultsUser = $db->query($sqlUser)->fetch_all(MYSQLI_ASSOC);
$searchUserResults = $db->query($searchUser)->fetch_all(MYSQLI_ASSOC);
//$searchEmailResults = $db->query($searchEmail)->fetch_all(MYSQLI_ASSOC);

?>

<h1 style="text-align: center; font-size: 45px">Admin Page</h1>
<br>


<div class="container">

    <div style="text-align: center">
        <a href="/Project/forms/createUser.php">
            <button class="btn btn-primary" type="button"
                    style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create User
            </button>
        </a>
        <a href="/Project/forms/addAnimal.php">
            <button class="btn btn-primary" type="button"
                    style="background-color: rgba(151,0,255,0.85); font-size: 30px">Add Animal
            </button>
        </a>
        <a href="/Project/forms/createSupplyItem.php">
            <button class="btn btn-primary" type="button"
                    style="background-color: rgba(151,0,255,0.85); font-size: 30px">Create Supply Item
            </button>
        </a>

    </div>

</div>
<br>

<div class="container">

    <form action="admin.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Search</button>
    </form>

    <table id="users" class="table table-striped">
        <thead style="text-align: center">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>

            <?php
            if (isset($search)){

            foreach ($searchUserResults

            as $r) { ?>
        <tr>
            <td> <?php echo $r['iduser']; ?></td>
            <td> <?php echo $r['username']; ?></td>
            <td> <?php echo $r['email']; ?></td>
            <td> <?php echo $r['password']; ?></td>
            <td> <?php echo $r['role']; ?></td>
            <td><a href="/Project/admin.php?editUser=<?php echo $r['iduser']; ?>">
                    <button class="btn btn-info" type="button">Edit</button>
                </a></td>
            <td><a href="/Project/admin.php?deleteUser=<?php echo $r['iduser']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"
                   class="btn btn-danger">Delete</a></td>
        </tr>

        <?php
        }
        }else{
        foreach ($sqlResultsUser

        as $r) { ?>
        <tr>
            <td> <?php echo $r['iduser']; ?></td>
            <td> <?php echo $r['username']; ?></td>
            <td> <?php echo $r['email']; ?></td>
            <td> <?php echo $r['password']; ?></td>
            <td> <?php echo $r['role']; ?></td>
            <td><a href="forms/updateUser.php?updateUser=<?php echo $r['iduser']; ?>">
                    <button class="btn btn-info" type="button">Edit</button>
                </a></td>
            <td><a href="/Project/admin.php?deleteUser=<?php echo $r['iduser']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"
                   class="btn btn-danger">Delete</a></td>
        </tr>

        <?php
        }}
        ?>


        </tbody>
    </table>
</div>

<?php

if (isset($_GET['deleteUser'])) {
    $id = $_GET['deleteUser'];
    $delUser = "DELETE FROM `user` WHERE `user`.`iduser` = '$id'";
    $db->query($delUser);
}

?>
