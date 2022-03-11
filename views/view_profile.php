<?php
session_start();
require_once "./../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/user.php";
require_once "./../Database/Model/Entities/favoritesOperations.php";
$user=false;
$_POST['id']=4;

if(isset($_POST['id']) && strlen($_POST['id'])>0) {
    $_SESSION['id'] = $_POST['id'];
    $user = $userTable->getUserByID($_POST['id']);
}

if(isset($_REQUEST['addFavorites'])){
    $favoritesTable->addToFavorites(intval($_REQUEST['addFavorites']));

}
if(isset($_REQUEST['removeFavorites'])){
    $favoritesTable->removeToFavorites(intval($_REQUEST['removeFavorites']));

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
            <h1 class=" text-center card-title"><b> <?= $user->getFirstName(). " ". $user->getLastName()   ?></b></h1>

            <a href="view_profile.php?addFavorites=<?php echo $user->getId() ?>"><button style="border-radius: 50%;"> + </button></a>
            <label>Favorite</label>
            <a href="view_profile.php?removeFavorites=<?php echo $user->getId() ?>"><button style="border-radius: 50%;"> - </button></a>
        </div>
        <div class="col-sm-8 profile-items position-absolute" style="top: 16rem;left: 25rem">

            <div class="row">
                <div class="col-md-8 align-self-end">
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
                                header("Location:messagePage.php");
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="col-md-4 ">
                    <div class="row">
                    <button style="width:100%;border-radius: 12px">Message</button> <br/>
                    </div><br/>
                    <div class="row">
                        <button style="width:100%;border-radius: 12px">Wink</button> <br/>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</body>
</html>
