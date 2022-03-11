<?php
require_once "../includes/header.php";
require_once "../Database/Model/Entities/userOperations.php";

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $loginStatus = $userTable->authenticateUsernameAndPassword($_REQUEST['username'], $_REQUEST['password']);
    //var_dump($loginStatus);
    session_start();

    if ($loginStatus[0]==true ){
        $_SESSION['username'] = $_REQUEST['username'];
        $_SESSION['password'] = $_REQUEST['password'];
        $_SESSION['id']=$loginStatus[0]->getId();
       // echo  $_SESSION['id'];
        //var_dump($loginStatus);
     //   echo "status" . $loginStatus[1];

      //  echo $loginStatus[0]->getId();


        header("location:index.php");

    } else {
        echo "<script>alert('Please check the username and password entered');</script>";

    }
}

?>
<html>
<body>

<div id="parent_div">
    <div class="header_navbar">
        <div class="header_navbar_logo">
            <!--                                                info related to logo-->
        </div>
        <div class="header_navbar_contents">
            <div class="header_navbar_contents_child">
                <a href="index.php">Home</a>
                <a href="#">Find</a>
                <a href="#">About</a>
                <a href="#">Register</a>
            </div>
        </div>
    </div>
    <div class="banner">
        <div id="banner-image">
            <div class="container">
                <div id="banner_content">
                    <form class="form-group">


                        <div class="form-group row">
                            <input type="text" class="form-control" name="username" required>
                            <label class="form-control-placeholder" for="username">Username</label>
                        </div>
                        <div class="form-group row">
                            <input id="password-field" type="password" class="form-control" name="password" required>
                            <label class="form-control-placeholder" for="password">Password</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button onclick="myFunction()" type="submit" class="btn">Login</button>
                            </div>
                        </div>
                        <div id="message" class="form-group row">
                            <div class="col-sm-6">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
