<?php

require_once "../Database/Model/Entities/userOperations.php";
//Second part: Display only if no errors and form got submitted.
if (count($_POST) >= 10) {
    $formSubmitted = true;
} else {
    $formSubmitted = false;
}
$error = false;

//Set all CSS Classes to default value. Change it later if there is an error.
$inputFirstNameCSS="form-control";
$inputLastNameCSS ="form-control";
$inputAgeCSS = "form-control";
$inputGenderCSS = "form-control";
$inputEmailCSS = "form-control";
$inputPasswordCSS = "form-control";
$inputDateOfBirthCSS = "form-control";
$inputPhoneNumber="form-control";

//DIV classes
$classForDiv="form-group row";

//For Errors, we want to find the inverse of GOOD. So anything that would make it an error.

if (isset($_POST['inputFirstName']) && strlen($_POST['inputFirstName']) > 50) {
    $error = true;
    $inputFirstNameCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
}
if (isset($_POST['inputLastName']) && strlen($_POST['inputLastName']) > 50) {
    $error = true;

    $inputLastNameCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
}
if (isset($_POST['inputAge'])) {
    $age = $_POST['inputAge'];
    if (!is_numeric($age) || $age <=18 || $age > 150) {
        $error = true;
        $inputAgeCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
    }
}
if (isset($_POST['inputPhoneNumber'])) {
    $phoneNumber = $_POST['inputPhoneNumber'];
    if (!is_numeric($phoneNumber)|| strlen(strval($phoneNumber))!=10) {
        $error = true;
        $inputPhoneNumber .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
    }
}

if (isset($_POST['inputEmail']) && !str_contains($_POST['inputEmail'], '@')) {
    $error = true;
    $inputEmailCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
}

if (isset($_POST['inputPassword']) && strlen($_POST['inputPassword']) > 50) {
    $error = true;
    $inputPasswordCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
}

if (isset($_POST['inputDateOfBirth'])) {
    if (strlen($_POST['inputDateOfBirth']) != 0) {
        $dob = $_POST['inputDateOfBirth'];
        //explode the date to get month, day and year
        $birthDate = explode("-", $dob);
        //get age from date or birthdate
        $monthDay = date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0])));
        if ($monthDay > date("md")) { //Compare Month and day to determine birthday has passed or not.
            $age = ((date("Y") - $birthDate[0]) - 1); //Birthday hasn't yet arrived. So, remove 1 year from birth.
        } else {
            $age = (date("Y") - $birthDate[0]);
        }

        if ($age < 18) {
            $error = true;
            $inputDateOfBirthCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
        }
    } else {
        $error = true;
        $inputDateOfBirthCSS .= " is-invalid"; //Concatenate to the css class. Make sure to add space for separation.
    }
}

$userTable = new  UserTable();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Sign Up Page</title>
</head>

<body>
<hr>
<div class="form-control">

    <div class="alert alert-primary" role="alert">
        Exercise - form
    </div>

    <form action="signUp.php" method="post" class="needs-validation" novalidate>
        <!--    No Validate forces the browser default validation to not trigger-->
        <div class="<?= $classForDiv ?>">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="<?= $inputFirstNameCSS ?>" id="inputFirstName" name="inputFirstName" required>
                <div class="invalid-feedback">
                    Maximum of 50 characters for name.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="<?= $inputLastNameCSS ?>" id="inputLastName" name="inputLastName" required>
                <div class="invalid-feedback">
                    Maximum of 50 characters for name.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAge" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" class="<?= $inputAgeCSS ?>" id="inputAge" name="inputAge" required>
                <div class="invalid-feedback">
                    Age needs between 18 to 150.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="<?= $inputEmailCSS ?>" id="inputEmail" name="inputEmail">
                <div class="invalid-feedback">
                    Email needs to contain @ symbol.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-10">
                <input type="number" class="<?= $inputPhoneNumber ?>" id="inputPhoneNumber" name="inputPhoneNumber" maxlength="10" minlength="10">
                <div class="invalid-feedback">
                    Incorrect phone no format
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select id="inputGender" class="form-control" name="inputGender">
                    <option >Male</option>
                    <option>Female</option>
                    <option>May Be</option>
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="<?= $inputPasswordCSS ?>" id="inputPassword" name="inputPassword">
                <div class="invalid-feedback">
                    Password can only have a maximum 50 characters.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputDateOfBirth" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-10">
                <input type="date" class="<?= $inputDateOfBirthCSS ?>" id="inputDateOfBirth" name="inputDateOfBirth">
                <div class="invalid-feedback">
                    Need to be a minimum of 18 years old.
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputDrinkerSelection" class="col-sm-2 col-form-label">Do You Drink?</label>
            <div class="col-sm-10">
                <select id="inputDrinkerSelection" class="form-control" name="inputDrinkerSelection">
                    <option selected>May Be</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSmokeSelection" class="col-sm-2 col-form-label">Do You Smoke?</label>
            <div class="col-sm-10">
                <select id="inputSmokeSelection" class="form-control" name="inputSmokeSelection">
                    <option selected>May Be</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</div>


<form>
    <hr>

    <!-- The following content appears only when the form data is valid-->
    <?php
    if ($formSubmitted && !$error) {
        echo "Form Submitted";
        ?>

        <div class="alert alert-primary" role="alert">
            Submit Result
        </div>

        <ul class="list-group">
            <!-- The value of each of the fields of the form is displayed using LI-->
            <?php
           function getIntegerValue($userInputforDrinkerAndSmoker):int{
               switch ($userInputforDrinkerAndSmoker){
                   case "Yes":
                       return 1;

                   case "MayBe":
                   case "No":
                   default:
                       return 0;
               }
           }

           function getGenderEnum($userGenderInput):string{
               switch ($userGenderInput){
                   case "Male":
                       return "M";

                   case "Female":
                       return "F";

                   case "Others":
                   default:
                       return "O";


               }
           }
            $newRegisteredUser=new User($_POST['inputFirstName'],$_POST['inputLastName'],getGenderEnum($_POST['inputGender']),$_POST['inputAge'],$_POST['inputEmail'],$_POST['inputPassword'],$_POST['inputPhoneNumber'],0,getIntegerValue($_POST['inputDrinkerSelection']),getIntegerValue($_POST['inputSmokeSelection']));
           $userTable->insert($newRegisteredUser);

            foreach ($_POST as $item => $value){
                echo "<li class='list-group-item'>";
                if (is_array($value)) {
                    echo "{$item}: ";
                    foreach ($value as $singleValueInArray) {
                        echo "{$singleValueInArray} ";
                    }
                } else {
                    echo "$item: $value";
                }
                echo "</li>";
            }
            ?>
        </ul>

        <?php
    }
    ?>
</form>

</div>

</div>
<hr>
</body>

</html>
