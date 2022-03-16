
<?php

require_once "./../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/user.php";

if(isset($_SESSION['id'])) {
    $user = $userTable->getUserByID($_SESSION['id']);
}
else{
    $_SESSION['username']="Guest";
}
?>
<div class="header_navbar">
    <div class="header_navbar_logo">
        <!--                                                info related to logo-->
        <a href="../views/index.php"> <img src="../images/datein_logo.png"> </a>
    </div>
    <div class="header_navbar_contents">
        <div class="header_navbar_contents_child">
            <a href="../views/index.php">Home</a>
            <a href="../views/#">About</a>

            <?php

            if(isset($_SESSION['username'])) {
                if ($_SESSION['username'] == "Guest") {
                    echo "<a href = '../views/login.php'> Login</a >";

                }
            }

            if(isset($_SESSION['username'])){

                if($_SESSION['username']!="Guest") {
                    echo "<a href='profileDetails.php'>Hello " . $user->getFirstName() . " " . $user->getLastName() . "</a>";

                    echo "<a href = '../views/logout.php'> Logout</a >";
                }
                else{
                    echo "Hello ".$_SESSION['username'];
                }
            }


            ?>
        </div>
    </div>
</div>
