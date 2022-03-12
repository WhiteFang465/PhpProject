<?php
require_once "database.php";
class MessageTable extends Database {

    function ureadMessageCount(int $id) :int{
        $query = "select count(is_read) from message where to_user_id like :to_user_id and is_read like :is_read";
        $values = ["to_user_id"=>$id,"is_read"=>0];
        $result = $this->execute($query,$values);
        return $result[0]["count(is_read)"];
    }

    function markAsRead(int $toUserId, int $fromUserId){
        $query = "update message set is_read=? where to_user_id=? and from_user_id=?";
        $values = [1,$toUserId,$fromUserId];
        $this->execute($query,$values);
    }

}
//$message = new MessageTable();
//$message->ureadMessageCount(9);
