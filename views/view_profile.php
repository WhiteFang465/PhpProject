<?php
if(session_status()!=PHP_SESSION_ACTIVE){
    session_start();
}
require_once "./../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/user.php";
require_once "./../Database/Model/Entities/favoritesOperations.php";
require_once "./../Database/Model/Entities/winkOperations.php";


?>



<!doctype html>
<html lang="en">
<?php require_once "./../includes/header.php" ?>

<body>


<div class="container-fluid">
    <?php
    require_once "./../includes/NavBar.php";

    $user=false;
    $winkOperation = new WinkTable();
    if (isset($_GET['winkId'])){
        $winkOperation->insert($_SESSION['id'],$_GET['winkId']);
    }

    if(isset($_REQUEST['pid']) && strlen($_REQUEST['pid'])>0) {
        //$_SESSION['pid'] = $_REQUEST['pid'];
        $user = $userTable->getUserByID(intval($_REQUEST['pid']));

    }

    if(isset($_REQUEST['addFavorites'])){
        $favoritesTable->addToFavorites(intval($_REQUEST['addFavorites']));

    }
    if(isset($_REQUEST['removeFavorites'])){
        $favoritesTable->removeToFavorites(intval($_REQUEST['removeFavorites']));

    }
    ?>
    <div class="row profile-bg position-relative" style="margin-bottom: 20rem;width: 100%;height: 100px;/* background-color: #cd4e89; */margin-left: 2px;margin-right: 2px;">
        <div class="col-sm-2 position-absolute">
            <?php
            $profilePicture="./../images/user-icon-png.png";
            if(($user->getProfilePicture())!="")
                $profilePicture= "./../images/Profile_Pictures/". $user->getProfilePicture();

            ?>
            <img class="img-thumbnail rounded img-shadow mb-3" style="border-style: none !important;"
                 src="<?= $profilePicture ?>">

            <h1 class=" text-center card-title"><b> <?= $user->getFirstName(). " ". $user->getLastName()   ?></b></h1>
            <center>
            <a href="view_profile.php?pid=<?= $_REQUEST['pid'] ?>&addFavorites=<?php echo $user->getId() ?>"><button style="border-radius: 60%;font-size: 20px; background-color: #cd4e89;color: #e6e6e6"> + </button></a>
            <label style="font-size: 20px;"><b>Favorite</b></label>
            <a href="view_profile.php?pid=<?= $_REQUEST['pid'] ?>&removeFavorites=<?php echo $user->getId() ?>"><button style="border-radius: 60%;font-size: 20px;background-color: #cd4e89;color: #e6e6e6"> - </button></a>
            </center>
        </div>
        <div class="col-sm-8 profile-items position-absolute" style="top: 16rem;left: 25rem">

            <div class="row">
                <div class="col-md-8 align-self-end">
                    <?php
                    require_once "profileDetails.php";

                    ?>
                </div>
                <div class="col-md-4 ">
                    <br/>
                    <br/>
                    <div class="row">

                    <button onclick="redirectTomessagePage(<?php echo $user->getId() ?>)" style="width:80%;border-radius: 12px;font-size:20px;background-color: #cd4e89;color: #e6e6e6">Message</button> <br/>
                    </div><br/>
                    <div class="row">
                        <button onclick="redirectTowinkPage(<?php echo $user->getId() ?>)" style="width:80%;border-radius: 12px;font-size:20px;background-color: #cd4e89;color: #e6e6e6">Wink</button> <br/>
                    </div><br/>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function redirectTomessagePage(id){
        window.location.href = "messagePage.php?pid="+id;
    }
    function redirectTowinkPage(id){
        window.location.href = "view_profile.php?winkId="+id+"&pid="+id;
    }
</script>
