<?php
require_once "./../Database/Model/Entities/database.php";

$dataBase = new Database();

$query = "select from_user_id,to_user_id from wink where to_user_id like :to_user_id";
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
        <a href="profilePage.php?paramId=<?=$wink['from_user_id']?>"><?=$firstName." send you wink"?></a>
    </div>
<?php }
?>

</body>
</html>