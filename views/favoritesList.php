<?php
require_once "./../Database/Model/Entities/database.php";
require_once "./../Database/Model/Entities/userOperations.php";

$dataBase = new Database();

$query = "select user_id,favorite_persons_user_id from favorites where user_id like :to_user_id";
$values = ["to_user_id" => $_SESSION['id']];
$favorites = $dataBase->execute($query, $values);

if (isset($_REQUEST['pid']) && strlen($_REQUEST['pid']) > 0) {
    $_SESSION['pid'] = $_REQUEST['pid'];
    $user = $userTable->getUserByID($_REQUEST['pid']);
}else{
    $user = $userTable->getUserByID($_SESSION['id']);
}


?>

<!doctype html>
<html lang="en">
<head>
    <?php require_once "./../includes/header.php"?>
    <?php require_once "./../includes/navbar.php"?>
</head>
<body>
<?php
foreach ($favorites as $favorite) {
    $firstName = $dataBase->getName($favorite['favorite_persons_user_id']);
    ?>
    <div class="alert alert-info" role="alert">
        <a href="profilePage.php?paramId=<?=$favorite['user_id']?>"><?=$firstName." is added to your favorites"?></a>
    </div>
<?php }
?>

</body>
</html>