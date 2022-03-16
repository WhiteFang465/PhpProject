<?php
require_once "./../Database/Model/Entities/database.php";

$dataBase = new Database();

$query = "select user_id,favorite_persons_user_id from favorites where user_id like :to_user_id";
$values = ["to_user_id" => $_SESSION['id']];
$winks = $dataBase->execute($query, $values);


?>

<!doctype html>
<html lang="en">
<head>
    <?php require_once "./../includes/header.php"?>
    <?php require_once "./../includes/navbar.php"?>
</head>
<body>
<?php
foreach ($winks as $wink) {
    $firstName = $dataBase->getName($wink['from_user_id']);
    ?>
    <div class="alert alert-info" role="alert">
        <a href="profilePage.php?paramId=<?=$wink['from_user_id']?>"><?=$firstName." added you to favorites"?></a>
    </div>
<?php }
?>

</body>
</html>