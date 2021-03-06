<?php
require_once "../includes/header.php";
require_once "../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/database.php";


if(!isset($_SESSION['username'])){
    $_SESSION['username']="Guest";
}

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $loginStatus = $userTable->authenticateUsernameAndPassword($_REQUEST['username'], $_REQUEST['password']);
    //var_dump($loginStatus);
    if(session_status()!=PHP_SESSION_ACTIVE){
        session_start();
    }

    if ($loginStatus[0]==true ){
        $_SESSION['username'] = $_REQUEST['username'];
        $_SESSION['password'] = $_REQUEST['password'];
        $_SESSION['id']=$loginStatus[0]->getId();
        $_SESSION['name'] = $loginStatus[0]->getFirstName();



        header("location:index.php");

    }
}

?>
<html>
<body>

<div id="parent_div">
    <?php require_once "../includes/navbar.php"; ?>
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

                                <br/><br/>
                                <?php
                                    if(isset($loginStatus)) {
                                        if (!$loginStatus[0]) {
                                            echo "<font color='white'> Incorrect username or password </font><br/><br/>";
                                        }
                                    }
                                ?>
                                <a href="SignUpUI.php"><font color="white">Create an account</font></a>

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
        <?php require_once "../includes/footer.php"; ?>
    </div>
</body>
</html>