<?php
session_start();
require_once "./../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/user.php";
$user=false;
$_POST['id']=4;
if(isset($_POST['id']) && strlen($_POST['id'])>0) {
    $_SESSION['id'] = $_POST['id'];
    $user = $userTable->getUserByID($_POST['id']);
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
                 src="./../images/Profile_Pictures/<?php echo $user->getProfilePicture();  ?> ">
            <h1 class=" text-left card-title"><b> <?= $user->getFirstName(). " ". $user->getLastName()   ?></b></h1>

        </div>
        <div class="col-sm-8 profile-items position-absolute" style="top: 20rem;left: 25rem">

            <div class="row">
                <div class="col-md-12 align-self-end">
                    <?php
                    echo $user->getAge();
                    /*if (isset($_GET['param'])) {
                        switch ($_GET['param']) {
                            case 'profileDetails':
                                require_once "view_profile.php";
                                break;

                        }
                    }*/
                    ?>
                </div>

            </div>



        </div>
    </div>
</div>


</body>
</html>
