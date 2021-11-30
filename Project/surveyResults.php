<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../database.php';
$db = NewConnection();

//$surveyResultsSql = "Select * from `surveyResults`";
//
//$surveyResults = $db->query($surveyResultsSql)->fetch_all(MYSQLI_ASSOC);


$homeType = $_POST['hometype'];
$budget = $_POST['budget'];
$annualCost = $_POST['annualCost'];
$olderChildFriendly = $_POST['olderChildFriendly'];
$youngerChildFriendly = $_POST['youngerChildFriendly'];
$petExercise = $_POST['petExercise'];
$petSocial = $_POST['petSocial'];
$petWeight = $_POST['petWeight'];
$petFriendlyPets = $_POST['petFriendlyPets'];
$homeAlone = $_POST['homeAlone'];

//Dogs
$Yorkshire_Terrier = 0;
$Golden_Retriever = 0;
$Maltese = 0;

//Cats
$Tabby = 0;
$Norwegian_Forest_Cat = 0;
$Persian = 0;
$Bengal = 0;

//Birds
$Parakeet = 0;
$Parrotlets = 0;


switch ($homeType) {
    case "Apt/Condo":
        $Tabby++;
        $Norwegian_Forest_Cat++;
        $Persian++;
        $Bengal++;
        $Maltese++;
        $Yorkshire_Terrier++;
        $Parakeet++;
        $Parrotlets++;
        break;

    case "House";
        $Golden_Retriever++;
        break;

    default:
//        echo "No entry found";
}


switch ($budget) {
    case $budget >= 50 && $budget <= 100:
        $Norwegian_Forest_Cat++;
        $Persian++;
        $Bengal++;
        $Parakeet++;
        break;

    case $budget > 100 && $budget < 300;
        $Tabby++;
        $Maltese++;
        $Parrotlets++;
        break;

    case $budget > 300;
        $Golden_Retriever++;
        $Yorkshire_Terrier++;
        break;
}


switch ($annualCost) {

    case $annualCost >= 185 && $annualCost <= 2000:
        $Tabby++;
        $Maltese++;
        $Yorkshire_Terrier++;
        $Parakeet++;
        $Parrotlets++;
        break;

    case $annualCost > 2000:
        $Golden_Retriever++;
        $Norwegian_Forest_Cat++;
        $Persian++;
        $Bengal++;
        break;

}


switch ($olderChildFriendly) {

    case $olderChildFriendly == 'Yes':
        $Golden_Retriever++;
        $Norwegian_Forest_Cat++;
        $Persian++;
        $Bengal++;
        $Tabby++;
        $Maltese++;
        $Yorkshire_Terrier++;
        $Parakeet++;
        break;

    case $olderChildFriendly == 'No':
        $Parrotlets++;
        break;

    case $olderChildFriendly == NULL:
        echo "nothing filled out";

}

switch ($youngerChildFriendly) {

    case $youngerChildFriendly == 'Yes':
        $Golden_Retriever++;
        $Norwegian_Forest_Cat++;
        break;

    case $youngerChildFriendly == 'No':
        $Persian++;
        $Bengal++;
        $Tabby++;
        $Maltese++;
        $Yorkshire_Terrier++;
        $Parakeet++;
        $Parakeet++;
        break;
}

switch ($petExercise) {

    case $petExercise == 'Low':
        $Tabby++;
        $Persian++;
        $Norwegian_Forest_Cat++;
        break;

    case $petExercise == 'Medium':
        $Yorkshire_Terrier++;
        $Maltese++;
        $Bengal++;
        break;

    case $petExercise == 'High':
        $Parrotlets++;
        $Parakeet++;
        break;

    case $petExercise == 'VeryHigh':
        $Golden_Retriever++;
        break;

}

switch ($petSocial) {

    case $petSocial == 'Low':
        $Tabby++;
        $Persian++;
        $Norwegian_Forest_Cat++;
        break;

    case $petSocial == 'Medium':
        $Yorkshire_Terrier++;
        $Bengal++;
        break;

    case $petSocial == 'High':
        $Maltese++;
        $Golden_Retriever++;
        $Parakeet++;
        break;

    case $petSocial == 'VeryHigh':
        $Parrotlets++;
        break;
}


switch ($petWeight) {

    case $petWeight == 'Low':
        $Tabby++;
        $Persian++;
        $Maltese++;
        $Yorkshire_Terrier++;
        $Bengal++;
        $Parakeet++;
        $Parrotlets++;
        break;

    case $petWeight == 'Medium':
        $Norwegian_Forest_Cat++;
        break;

    case $petWeight == 'High':
        $Golden_Retriever++;
        break;

}


switch ($petFriendlyPets) {

    case $petFriendlyPets == 'Yes':
        $Golden_Retriever++;
        $Norwegian_Forest_Cat++;
        $Bengal++;
        $Tabby++;
        $Maltese++;
        break;

    case $petFriendlyPets == 'No':
        $Persian++;
        $Yorkshire_Terrier++;
        $Parakeet++;
        $Parakeet++;
        break;

}


switch ($homeAlone) {

    case $homeAlone == 'Low':
        $Golden_Retriever++;
        $Yorkshire_Terrier++;
        break;

    case $homeAlone == 'Medium':
        $Maltese++;
        break;

    case $homeAlone == 'High':
        $Parakeet++;
        $Parrotlets++;
        break;

    case $homeAlone == 'VeryHigh':
        $Bengal++;
        $Tabby++;
        $Persian++;
        $Norwegian_Forest_Cat++;
        break;
}



$sql = "INSERT INTO `surveyResults`(`idsurveyResults`, `animalType`, `animalBreed`, `animalName`, `score`)
VALUES (NULL, 'K-9', 'Golden Retriever', 'Vinny',  '$Golden_Retriever'),
       (NULL, 'K-9', 'Yorkshire Terrier', 'Gizmo',  '$Yorkshire_Terrier'),
       (NULL, 'K-9', 'Maltese', 'Hope',  '$Maltese'),
       (NULL, 'Feline', 'Tabby', 'Jack',  '$Tabby'),
       (NULL, 'Feline', 'Norwegian Forest Cat', 'Nova',  '$Norwegian_Forest_Cat'),
       (NULL, 'Feline', 'Persian', 'Tiffiny',  '$Persian'),
       (NULL, 'Feline', 'Bengal', 'Sage',  '$Bengal'),
       (NULL, 'Aves', 'Parakeet', 'Ryze',  '$Parakeet'),
       (NULL, 'Aves', 'Parrotlets', 'Lime',  '$Parrotlets');";

$sqlSort = "Select * from `surveyResults` order by score DESC;";

if (isset($_POST['survey'])) {
    $db->query($sql);
    $db->query($sqlSort);
}

$surveyResults = $db->query($sqlSort)->fetch_all(MYSQLI_ASSOC);

//Test code for values of survey entries

//var_dump($_POST['hometype']);
//echo "<br>";
//var_dump($_POST['budget']);
//echo "<br>";
//var_dump($_POST['annualCost']);
//echo "<br>";
//var_dump($_POST['olderChildFriendly']);
//echo "<br>";
//var_dump($_POST['youngerChildFriendly']);
//echo "<br>";
//var_dump($_POST['petExercise']);
//echo "<br>";
//var_dump($_POST['petSocial']);
//echo "<br>";
//var_dump($_POST['petWeight']);
//echo "<br>";
//var_dump($_POST['petFriendlyPets']);
//echo "<br>";
//var_dump($_POST['homeAlone']);


?>

<h1 style="text-align: center; font-size: 45px">Survey Results</h1>
<br>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">

        <table id="sessions" class="table table-striped">
            <thead style="text-align: center">
            <tr>
                <th>Score</th>
                <th>Name</th>
                <th>Animal Type</th>
                <th>Animal Breed</th>
            </tr>

            </thead>

            <tbody>
            <tr>

                <?php
                foreach ($surveyResults

                as $sr) { ?>
            <tr>
                <td> <?php echo $sr['score']; ?></td>
                <td> <?php echo $sr['animalName']; ?></td>
                <td> <?php echo $sr['animalType']; ?></td>
                <td> <?php echo $sr['animalBreed']; ?></td>

            </tr>

            <?php
            }

            ?>

            </tr>
            </tbody>
        </table>

        <br>
        <a href="forms/survey.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>

<?php

// Resets the table to be empty so the next survey will have new results
// Stops duplication when refreshing the page
$refreshTable = "Delete from `surveyResults`";
$db->query($refreshTable);

?>


