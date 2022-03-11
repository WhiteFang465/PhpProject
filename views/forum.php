


<?php
require_once "../Database/Model/Entities/userOperations.php";
//require_once "../Database/Model/Entities/database.php";
session_start();
//echo $_SESSION['username'];
//echo $_REQUEST['textarea'];
if(isset($_SESSION['username'])&&isset($_REQUEST['textarea']))
{
    $message=$_REQUEST['textarea'];
    $username=$_SESSION['username'];
    $id=$_SESSION['id'];


    $db=new UserTable();
$db->insertToForum($message,$id);

$result=$db->retrieveFromForum();


    foreach ($result as $value ){
        foreach ($value as $key=>$newValue){
            ?>
            <input type="textbox" value="  <?php echo "$key".":"."$newValue";?>" readonly>
            <br>


<?php
        }


    }


}


?>
<form method="post" action="">
    <input name="textarea" type="textarea"><br>
    <button type="submit" >send message</button>
    <br>
</form>