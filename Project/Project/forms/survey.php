<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$header = $path . '/includes/projectHeader.php';
$menu = $path . '/includes/projectMenu.php';
$navBar = $path . '/includes/navigationBar.php';

include $header;
include $navBar;

require '../../database.php';
$db = NewConnection();

?>

<h1 style="text-align: center; font-size: 45px">Find your Future Pet Survey</h1>
<br>


<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form action="../surveyResults.php" method="POST" class="form-horizontal">

            <p>1. What type of home do you live in?</p>
            <input type="radio" id="hometype" name="hometype" value="Apt/Condo" required>
            <label for="hometype">Apartment/Condo</label>
            <br>
            <input type="radio" id="hometype" name="hometype" value="House" required>
            <label for="hometype">House</label>

            <p>2. What is your budget (what is the maximum amount you’d be willing to spend to adopt a pet.
                Our most expensive animal is $500 and lowest is $50)?
            </p>

            <label for="budget">Budget in Dollars </label>
            <input type="number" id="budget" name="budget" value="budget" required>

            <br>

            <p>3. The annual cost of care for our animals ranges from $185.00 to $6,095.00.
                What is your budget for the annual cost of care for one of our animals?
            </p>

            <label for="annualCost">Annual Cost Budget </label>
            <input type="number" id="annualCost" name="annualCost" value="annualCost" required>

            <p>4. Would you like a pet that is good with older children (over 8)?
            </p>

            <input type="radio" id="olderChildFriendly" name="olderChildFriendly" value="Yes" required>
            <label for="olderChildFriendly">Yes</label>
            <br>
            <input type="radio" id="olderChildFriendly" name="olderChildFriendly" value="No" required>
            <label for="olderChildFriendly">No</label>

            <p>5. Would you like a pet that is good with younger children (younger than 8)?
            </p>

            <input type="radio" id="youngerChildFriendly" name="youngerChildFriendly" value="Yes" required>
            <label for="youngerChildFriendly">Yes</label>
            <br>
            <input type="radio" id="youngerChildFriendly" name="youngerChildFriendly" value="No" required>
            <label for="youngerChildFriendly">No</label>

            <p>6. How much time can you dedicate to helping your pet exercise?
            </p>

            <input type="radio" id="petExercise" name="petExercise" value="Low" required>
            <label for="petExercise">Low - 20 to 30 minutes a day</label>
            <br>
            <input type="radio" id="petExercise" name="petExercise" value="Medium" required>
            <label for="petExercise">Medium - 60 minutes a day</label>
            <br>
            <input type="radio" id="petExercise" name="petExercise" value="High" required>
            <label for="petExercise">High - more than 60 minutes a day</label>
            <br>
            <input type="radio" id="petExercise" name="petExercise" value="VeryHigh" required>
            <label for="petExercise">Very high - 90 minutes a day</label>

            <p>7. How much time can you dedicate to socializing with your pet?
            </p>

            <input type="radio" id="petSocial" name="petSocial" value="Low" required>
            <label for="petSocial">Low - 20 to 30 minutes a day</label>
            <br>
            <input type="radio" id="petSocial" name="petSocial" value="Medium" required>
            <label for="petSocial">Medium - 60 minutes a day</label>
            <br>
            <input type="radio" id="petSocial" name="petSocial" value="High" required>
            <label for="petSocial">High - more than 60 minutes a day</label>
            <br>
            <input type="radio" id="petSocial" name="petSocial" value="VeryHigh" required>
            <label for="petSocial">Very high - 90 minutes a day</label>


            <p>8. In weight, what size pet would you like?
            </p>

            <input type="radio" id="petWeight" name="petWeight" value="Low" required>
            <label for="petWeight">Low - 0 to 20 lbs</label>
            <br>
            <input type="radio" id="petWeight" name="petWeight" value="Medium" required>
            <label for="petWeight">Medium - 20 to 30 lbs</label>
            <br>
            <input type="radio" id="petWeight" name="petWeight" value="High" required>
            <label for="petWeight">High - greater than 50 lbs</label>
            <br>


            <p>9. Would you like a pet that gets along with other pets?
            </p>

            <input type="radio" id="petFriendlyPets" name="petFriendlyPets" value="Yes" required>
            <label for="petFriendlyPets">Yes</label>
            <br>
            <input type="radio" id="petFriendlyPets" name="petFriendlyPets" value="No" required>
            <label for="petFriendlyPets">No</label>


            <p>10. How many hours would you like a pet to tolerate being home alone?
            </p>

            <input type="radio" id="homeAlone" name="homeAlone" value="Low" required>
            <label for="homeAlone">Low - 4-6 hours a day</label>
            <br>
            <input type="radio" id="homeAlone" name="homeAlone" value="Medium" required>
            <label for="homeAlone">Medium - 8 hours a day</label>
            <br>
            <input type="radio" id="homeAlone" name="homeAlone" value="High" required>
            <label for="homeAlone">High - 12 hours a day</label>
            <br>
            <input type="radio" id="homeAlone" name="homeAlone" value="VeryHigh" required>
            <label for="homeAlone">Very high - 12+ hours a day</label>


            <a href="../surveyResults.php" class="login">
                <button type="submit" style="background-color: rgba(255,242,43,0.85); width: 100%" id="survey"
                        name="survey"
                        class="btn btn-default">Submit Survey
                </button>
            </a>
            <!--                        <button type="submit" style="background-color: rgba(27,255,20,0.6)" class="btn" id="createButton">Create</button>-->

        </form>


        <br>
        <a href="../home.php" class="login">
            <button type="submit" style="background-color: rgba(255,17,12,0.6)" class="btn" id="cancelButton">Cancel
            </button>
        </a>

    </div>
</div>

<?php

?>

