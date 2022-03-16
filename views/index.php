<html>
<?php


require_once "./../includes/header.php";
require_once "./../Database/Model/Entities/user.php";
require_once "./../Database/Model/Entities/userOperations.php";
//session_start();

$demoProfile = [];
$users = $userTable->getAllUsers();

if (isset($_POST["looking_for_select"])) {
    $gender = $_POST["looking_for_select"];
    $minAge = 18;
    $maxAge = 60;
    if (isset($_POST["min_age"]) && strlen($_POST["min_age"]) != 0) {
        $minAge = intval($_POST["min_age"]);
    }
    if (isset($_POST["max_age"]) && strlen($_POST["max_age"]) != 0) {
        $maxAge = intval($_POST["max_age"]);
    }
    $users = $userTable->getUsersByAgeAndGender($minAge, $maxAge, $gender);

}
if (isset($_POST['search_by_name'])) {
    if (strlen($_POST['search_by_name']) > 0) {
        if ($userTable->searchUserLike($_POST['search_by_name']))
            $users = $userTable->searchUserLike($_POST['search_by_name']);

    }
}
foreach ($users as $user) {

    array_push($demoProfile, [
        "id" => $user->getId(),
        "name" => $user->getFirstName() . " " . $user->getLastName(),
        "imgSrc" => $user->getProfilePicture(),
        "gender" => $user->getGender(),
        "age" => $user->getAge()
    ]);
}

?>
<body>
<div id="parent_div">
    <?php require_once "../includes/navbar.php"; ?>
    <div class="banner">
        <div id="banner-image">
            <div class="container">
                <div id="banner_content">
                    <form class="form-group" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Looking For</label>
                            <select class="form-select form-select-sm col-sm-6" name="looking_for_select">
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                                <option value="O">Others</option>

                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">From Age</label>
                            <input type="number" class="form-control col-sm-6" name="min_age" placeholder="Minimum Age">
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">To Age</label>
                            <input type="number" class="form-control col-sm-6" name="max_age" placeholder="Maximum Age">
                        </div>
                        <hr>
                        <h3>OR</h3>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Search</label>
                            <input type="text" class="form-control col-sm-6" name="search_by_name"
                                   placeholder="Search By Name">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn">Let's Go</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="profiles_for_guest">

        <div class="profiles_holder">
            <?php
            foreach ($demoProfile as $key) {
                if (isset($_SESSION['id']) && $key['id'] == $_SESSION['id'])
                    continue;
                ?>
                <div class="profiles_for_guest_container">
                    <img src="../images/Profile_Pictures/<?= $key['imgSrc'] ?>" alt="<?= $key['name'] ?>"
                         class="profiles_for_guest_image">
                    <div class="profiles_for_guest_middle">
                        <div><h5>Name : <?= $key['name'] ?> </h5>
                            <h5>Age : <?= $key['age'] ?></h5>
                            <h5>Gender : <?= $key['gender'] ?></h5>
                            <?php
                            if (!isset($_SESSION['id'])) { ?>
                                <a class="btn" href="login.php">Connect</a>
                            <?php } else { ?>
                                <a class="btn" href="view_profile.php?pid=<?= $key['id'] ?>">Connect</a>
                            <?php }
                            ?>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
    <?php require_once "../includes/footer.php"; ?>

</div>
</body>
</html>