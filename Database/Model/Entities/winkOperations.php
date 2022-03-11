<?php
require_once "database.php";
require_once "wink.php";
$database = new Database();
if (isset($_GET['id'])){

    $fromUserId = $_SESSION['id'];
    $toUserId = $_GET['id'];
    $winkModel = new Wink($fromUserId,$toUserId);

    $query = "insert into wink(from_user_id, to_user_id, is_read) values(?,?,?) ";
    $values = [$winkModel->getFromUserId(),$winkModel->getToUserId(),$winkModel->isRead()];
    $database->executeInsert($query,$values);

    header("location:profilePage.php");
}
