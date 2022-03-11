<?php
if(!isset($_SESSION['id'])){
    session_start();
    echo $_SESSION['id'];
}

?>
<html>
<a href=""?id="<?php  echo $_SESSION['id'] ?>">add</a> <br>
<a href="">remove</a>

</html>
