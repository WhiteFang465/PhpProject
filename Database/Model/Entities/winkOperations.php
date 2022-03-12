<?php
require_once "database.php";
require_once "wink.php";

class WinkTable extends Database
{
    function insert(int $fromUserId, int $toUserId)
    {
        $winkModel = new Wink($fromUserId, $toUserId);
        $query = "insert into wink(from_user_id, to_user_id, is_read) values(?,?,?) ";
        $values = [$winkModel->getFromUserId(), $winkModel->getToUserId(), $winkModel->isRead()];
        $this->executeInsert($query, $values);

    }
    function ureadWinkCount(int $id) :int{
        $query = "select count(is_read) from wink where to_user_id like :to_user_id and is_read like :is_read";
        $values = ["to_user_id"=>$id,"is_read"=>0];
        $result = $this->execute($query,$values);
        return $result[0]["count(is_read)"];
    }

    function markAsRead(int $toUserId, int $fromUserId){
        $query = "update wink set is_read=? where to_user_id=? and from_user_id=?";
        $values = [1,$toUserId,$fromUserId];
        $this->execute($query,$values);
    }
}

//$w = new WinkTable();
//$w->insert(4,5);

//echo $_SESSION['id'];
//if (isset($_GET['id'])){
//    $fromUserId = $_SESSION['id'];
//    $toUserId = $_GET['id'];
//    $winkModel = new Wink($fromUserId,$toUserId);
//
//    $query = "insert into wink(from_user_id, to_user_id, is_read) values(?,?,?) ";
//    $values = [$winkModel->getFromUserId(),$winkModel->getToUserId(),$winkModel->isRead()];
//    $database->executeInsert($query,$values);
//
//}
