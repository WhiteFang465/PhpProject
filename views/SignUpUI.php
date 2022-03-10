<?php
require_once "../includes/header.php";
require_once "signUp.php";
?>

<body>
<div id="parent_div">
    <?php
    require_once "../includes/NavBar.php"
    ?>
    <div class="banner">
        <div id="banner-signUp-image">
            <div class="container">
                <div id="banner_content_signUp">
                    <form action="SignUpUI.php" method="post" class="needs-validation" novalidate>

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
                                <input type="number" class="<?= $inputPhoneNumberCCS ?>" id="inputPhoneNumber" name="inputPhoneNumber" maxlength="10" minlength="10">
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
                            <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="<?= $inputConfirmPasswordCSS ?>" id="inputConfirmPassword" name="inputConfirmPassword">
                                <div class="invalid-feedback">
                                    Your Password Does not match.
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


            </div>
        </div>
    </div>

</div>
</body>

