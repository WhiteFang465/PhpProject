<?php

require_once "./../Database/Model/Entities/user.php";
require_once "./../Database/Model/Entities/userOperations.php";
$user = $userTable->getUserByID(intval($_SESSION['id']));

?>
<!doctype html>
<html lang="en">
<?php require_once "./../includes/header.php" ?>
<body>
<div class="table-responsive">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3"><b>Edit Details</b></h4>


            <?php
            if (isset($_FILES['fileToUpload']) && strlen($_FILES['fileToUpload']['tmp_name']) > 0) {
                $imageFile = $_FILES['fileToUpload'];
                //name, full_path, type, tmp_name, error, size
                if ($imageFile['size'] > 4000_000) { //~2000kb
                    echo "File size too big.";
                } else {
                    $allowedTypes = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
                    $detectedType = exif_imagetype($imageFile['tmp_name']);
                    $validImageType = in_array($detectedType, $allowedTypes);
                    if (!$validImageType) {
                        echo "Invalid Type of image. Please upload (GIF, JPEG, PNG)";
                    } else {
                        $imageName = $user->getId() . "_" . $user->getEmail() . ".jpg";
                        move_uploaded_file($imageFile['tmp_name'], "../images/Profile_Pictures/$imageName");
                        $userTable->setProfilePictureByID($user->getId(), $imageName);
                    }
                }
            }

            ?>

            <form enctype="multipart/form-data" method="post" action="profilePage.php?param=update_profile">

                <?php
                $isDataUpdated = false;
                if (isset($_REQUEST["update_first_name"])) {
                    if (strlen($_REQUEST["update_first_name"]) > 0 &&
                        ($_REQUEST["update_first_name"] != $user->getFirstName())) {
                        $user->setFirstName($_REQUEST["update_first_name"]);
                        $isDataUpdated = true;
                    }
                }
                if (isset($_REQUEST["update_last_name"])) {
                    if (strlen($_REQUEST["update_last_name"]) > 0 &&
                        ($_REQUEST["update_last_name"] != $user->getLastName())) {
                        $user->setLastName($_REQUEST["update_last_name"]);
                        $isDataUpdated = true;
                    }
                }
                if (isset($_REQUEST["update_age"])) {
                    if (strlen($_REQUEST["update_age"]) > 0 &&
                        (intval($_REQUEST["update_age"])!=$user->getAge())) {
                        $user->setAge(intval($_REQUEST["update_age"]));
                        $isDataUpdated = true;
                    }
                }
                if (isset($_REQUEST["update_gender"])) {
                    if (strlen($_REQUEST["update_gender"]) > 0 &&
                        ($_REQUEST["update_gender"] != $user->getGender()))  {
                        $user->setGender($_REQUEST["update_gender"]);
                        $isDataUpdated = true;
                    }
                }


                ?>

                <table class="table table-data">
                    <tbody>
                    <tr>
                    <tr>
                        <td>
                            <?php
                            $profilePicture = "./../images/user-icon-png.png";
                            if (($user->getProfilePicture()) != "")
                                $profilePicture = "./../images/Profile_Pictures/" . $user->getProfilePicture();

                            ?>
                            <div class="profiles_for_guest_image">
                                <div class="mb-3">
                                    <img class="img-thumbnail rounded  mb-4" style="border-style: none !important;"
                                         src=" <?php echo $profilePicture ?>" width="200" height="200">
                                </div>
                                <div>
                        </td>
                        <td>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Profile Image</label>
                                <input class="form-control" type="file" id="formFile" name="fileToUpload">
                                <input type="submit" style="width:200px;align-items: center" value="Upload"/>
                            </div>
                        </td>
        </div>
    </div>
    </tr>
    <tr>
        <td style="width: 20% !important;">First Name</td>
        <td><input type="text" name="update_first_name"
                   value="<?php echo $user->getFirstName() ?>"></td>

    </tr>
    <tr>


        <td style="width: 20% !important;">Last Name</td>
        <td><input type="text" name="update_last_name"
                   value="<?php echo $user->getLastName() ?>"></td>

    </tr>
    <tr>
        <td>Age</td>
        <td><input type="text" name="update_age" value="<?php echo $user->getAge() ?>"></td>
    </tr>
    <tr>
        <td>I am a</td>
        <td><select name="update_gender">
                <?php
                if ($user->getGender() == "M") {
                    echo "  <option value='M' selected>Male</option>
                <option value='F'>Female</option>
                <option value='O'>Others</option>";
                } elseif ($user->getGender() == "F") {
                    echo "  <option value='M' >Male</option>
                <option value='F' selected>Female</option>
                <option value='O'>Others</option>";
                } elseif ($user->getGender() == "O") {
                    echo "  <option value='M' >Male</option>
                <option value='F'>Female</option>
                <option value='O' selected>Others</option>";
                }

                ?>

            </select>
        </td>


    </tr>
    <tr>
        <td colspan="2" style="align-content: center"><?php
            if ($isDataUpdated) {
                $userTable->update($user);
                echo "<br/>Profile Updated Successfully !";
            }
            ?></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="Save" value="SaveDetails" style="width:200px;"></td>
    </tr>


    <tr>

    </tr>
    </form>
    </tbody>
    </table>
</div>
</div>
</body>
</html>