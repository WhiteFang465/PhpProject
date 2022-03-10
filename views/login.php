<?php
require_once "../includes/header.php";
require_once "../Database/Model/Entities/userOperations.php";

if(isset($_REQUEST['username'])&&isset($_REQUEST['password']))
{
    $loginStatus= $userTable->authenticateUsernameAndPassword($_REQUEST['username'],$_REQUEST['password']);


    if($loginStatus){
        session_start();
        $_SESSION['username']=$_REQUEST['username'];
        $_SESSION['password']=$_REQUEST['password'];

        header("location:index.php");

    }else{
        echo "<script>alert('Please check the username and password entered');</script>";

    }
}

?>
<div class="banner">
    <div id="banner-image">
        <div class="container">
            <div id="banner_content">
                <form class="form-group">


                    <div class="form-group row">
                        <input type="text" class="form-control"  name="username" required>
                        <label class="form-control-placeholder" for="username">Username</label>
                    </div>

                    <div class="form-group row">
                        <input id="password-field" type="password" class="form-control" name="password" required>
                        <label class="form-control-placeholder" for="password">Password</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn">Let's Go</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
