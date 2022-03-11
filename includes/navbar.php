<?php


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
            else{
                $_SESSION['username']="Guest";
            }
            if(isset($_SESSION['username'])){
                echo "Hello ".$_SESSION['username'];
                if($_SESSION['username']!="Guest")
                    echo "<a href = '../views/logout.php'> Logout</a >";
            }


            ?>
        </div>
    </div>
</div>
