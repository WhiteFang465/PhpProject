<?php

require_once "../Database/Model/Entities/userOperations.php";

if (count($_POST) >= 10) {
    $formSubmitted = true;
} else {
    $formSubmitted = false;
}
$error = false;

//Input Classes
$inputFirstNameCSS = "form-control";
$inputLastNameCSS = "form-control";
$inputAgeCSS = "form-control";
$inputGenderCSS = "form-control";
$inputEmailCSS = "form-control";
$inputPasswordCSS = "form-control";
$inputConfirmPasswordCSS = "form-control";
$inputDateOfBirthCSS = "form-control";
$inputPhoneNumberCCS = "form-control";

//DIV classes
$classForDiv = "form-group row";


if (isset($_POST['inputFirstName']) && strlen($_POST['inputFirstName']) > 50) {
    $error = true;
    $inputFirstNameCSS .= " is-invalid";
}
if (isset($_POST['inputLastName']) && strlen($_POST['inputLastName']) > 50) {
    $error = true;

    $inputLastNameCSS .= " is-invalid";
}
if (isset($_POST['inputAge'])) {
    $age = $_POST['inputAge'];
    if (!is_numeric($age) || $age <= 18 || $age > 150) {
        $error = true;
        $inputAgeCSS .= " is-invalid";
    }
}
if (isset($_POST['inputPhoneNumberCCS'])) {
    $phoneNumber = $_POST['inputPhoneNumberCCS'];
    if (!is_numeric($phoneNumber) || strlen(strval($phoneNumber)) != 10) {
        $error = true;
        $inputPhoneNumberCCS .= " is-invalid";
    }
}

if (isset($_POST['inputEmail']) && !str_contains($_POST['inputEmail'], '@')) {
    $error = true;
    $inputEmailCSS .= " is-invalid";
}

if (isset($_POST['inputPassword']) && strlen($_POST['inputPassword']) > 50) {
    $error = true;
    $inputPasswordCSS .= " is-invalid";
}

if (isset($_POST['inputConfirmPassword']) && $_POST['inputConfirmPassword']!=$_POST['inputPassword']) {
    $error = true;
    $inputConfirmPasswordCSS .= " is-invalid";
}

if (isset($_POST['inputDateOfBirth'])) {
    if (strlen($_POST['inputDateOfBirth']) != 0) {
        $dob = $_POST['inputDateOfBirth'];

        $birthDate = explode("-", $dob);

        $monthDay = date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0])));
        if ($monthDay > date("md")) {
            $age = ((date("Y") - $birthDate[0]) - 1);
        } else {
            $age = (date("Y") - $birthDate[0]);
        }

        if ($age < 18) {
            $error = true;
            $inputDateOfBirthCSS .= " is-invalid";
        }
    } else {
        $error = true;
        $inputDateOfBirthCSS .= " is-invalid";
    }
}

$userTable = new  UserTable();

if ($formSubmitted && !$error) {
    echo "Form Submitted";


    function getIntegerValue($userInputforDrinkerAndSmoker): int
    {
        switch ($userInputforDrinkerAndSmoker) {
            case "Yes":
                return 1;

            case "MayBe":
            case "No":
            default:
                return 0;
        }
    }

    function getGenderEnum($userGenderInput): string
    {
        switch ($userGenderInput) {
            case "Male":
                return "M";

            case "Female":
                return "F";

            case "Others":
            default:
                return "O";


        }
    }

    $newRegisteredUser = new User($_POST['inputFirstName'], $_POST['inputLastName'], getGenderEnum($_POST['inputGender']), $_POST['inputAge'], $_POST['inputEmail'], $_POST['inputPassword'], $_POST['inputPhoneNumber'],"","", 0, getIntegerValue($_POST['inputDrinkerSelection']), getIntegerValue($_POST['inputSmokeSelection']));
    $userTable->insert($newRegisteredUser);
}

