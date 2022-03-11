<?php
session_start();
require_once "./../Database/Model/Entities/database.php";
require_once "./../Database/Model/Entities/message.php";
$db = new Database();

if (isset($_POST['id']) && isset($_POST['message']) && !empty($_POST['message'])) {
    $fromUserId = $_SESSION['id'];
    $toUserId = $_POST['id'];
    $message = $_POST['message'];

    $messageModel = new Message($fromUserId, $toUserId, $message);

    $query = "insert into message(from_user_id, to_user_id, message, is_read) values (?,?,?,?)";
    $values = [$messageModel->getFromUserId(), $messageModel->getToUserId(), $messageModel->getMessage(), $messageModel->isRead()];
    $db->executeInsert($query, $values);
}
