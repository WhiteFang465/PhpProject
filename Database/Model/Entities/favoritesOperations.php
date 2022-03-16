<?php
require_once "user.php";
require_once "favorites.php";
require_once "database.php";

class FavoriteTable extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addToFavorites(int $userID)
    {
        if(!($this->favoriteRecordExists($userID))) {
            $query = "insert into favorites (user_id, favorite_persons_user_id, added, removed, is_read ) VALUES (?, ?, ?, ?,?)";
            $values = [ $_SESSION['id'],$userID, 1, 0, 0];
            $idOfRow = $this->executeInsert($query, $values);
        }
    }
    public function favoriteRecordExists(int $userID) : bool
    {
        $query ="select * from favorites where user_id=? and favorite_persons_user_id=?";
        $values = [$_SESSION['id'], $userID];
        $result = $this->execute( $query, $values);
        if($result==false){
            return false;
        }
        else{
            return true;
        }

    }
    public function removeToFavorites(int $userID)
    {
        if($this->favoriteRecordExists($userID)) {

            $query = "update favorites  SET added=0, removed=1, is_read=0 where user_id=? and favorite_persons_user_id=?";
            $values = [$_SESSION['id'], $userID];
            $this->execute($query, $values);
        }
    }



}
$favoritesTable = new FavoriteTable();