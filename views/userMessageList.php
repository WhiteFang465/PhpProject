<?php
$database = new Database();
$query = "select from_user_id from message where to_user_id like :to_user_id";
$values = ["to_user_id"=>$_SESSION['id']];
$resultData = $database->execute($query,$values);
?>

<!doctype html>
<html lang="en">
<?php require_once "./../includes/header.php"?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 col-lg-5">
            <h6 class="text-muted">Send Messages</h6>
            <ul class="list-group">
                <?php
                foreach ($resultData as $data){
                    $firstName = $database->getName($data['from_user_id']);
                    $imgUrl = $database->getImageURL($data['from_user_id']);
                    ?>
                    <li class="list-group-item d-flex align-items-center">
                        <div class="image-parent">
                            <img src="./../images/download.jpg" alt="quixote">
                        </div>
                        <a href="messagePage.php?id=<?=$data['from_user_id']?>"><h5 style="margin-left: 3rem"><?=$firstName?></h5></a>
                    </li>
               <?php }
                ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
