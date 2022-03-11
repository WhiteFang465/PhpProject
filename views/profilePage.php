<?php
require_once "./../Database/Model/Entities/database.php";
session_start();
$database = new Database();
$userData = null;
$profileData = [];
if (isset($_SESSION['id'])){
    $userData = $database->getData($_SESSION['id']);
}
if (isset($_GET['paramId'])){
    $profileData = $database->getData($_GET['paramId']);
    $_SESSION['profileFirstName'] = $profileData[0]["first_name"];
}
?>


<!doctype html>
<html lang="en">
<?php require_once "./../includes/header.php" ?>

<body>


<div class="container-fluid">
    <?php require_once "./../includes/NavBar.php"; ?>
    <div class="row profile-bg position-relative" style="margin-bottom: 20rem;width: 100%;height: 100px;/* background-color: #cd4e89; */margin-left: 2px;margin-right: 2px;">
        <div class="col-sm-2 position-absolute">
            <img class="img-thumbnail rounded img-shadow mb-3" style="border-style: none !important;"
                 src="./../images/download.jpg">
            <h1 class=" text-left card-title"><b><?=$_SESSION['profileFirstName']?></b></h1>

        </div>
        <div class="col-sm-8 profile-items position-absolute" style="top: 10rem;left: 25rem">
            <div class="row" style="margin-bottom: 4rem">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profilePage.php?param=profileDetails">Profile</a>
                    </li>
                    <?php
                    if (isset($_SESSION['id']) && !isset($_SESSION['paramId']) && !isset($_GET['paramId'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profilePage.php?param=wink"> Wink <span
                                        class="badge badge-pill badge-light">1</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profilePage.php?param=messages"> Messages <span
                                        class="badge badge-pill badge-light">1</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profilePage.php?param=update_profile"> Update Profile <span
                                        class="badge badge-pill badge-light"></span></a>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 align-self-end">
                    <?php
                    if (isset($_GET['param'])) {
                        switch ($_GET['param']) {
                            case 'profileDetails':
                                require_once "profileDetails.php";
                                break;
                            case 'wink' :
                                require_once "winkNotification.php";
                                break;
                            case 'messages':
                               require_once "userMessageList.php";
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
