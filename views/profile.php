<!doctype html>
<html lang="en">
<?php require_once "./includes/header.php" ?>
<body>
<div class="container-fluid">
    <div class="row profile-bg position-relative" style="margin-bottom: 20rem">
        <div class="col-sm-2 position-absolute">
            <img class="img-thumbnail rounded img-shadow mb-3" style="border-style: none !important;"
                 src="./../images/download.jpg">
            <h1 class=" text-left card-title"><b>Jimena</b></h1>

        </div>
        <div class="col-sm-8 profile-items position-absolute" style="top: 12rem;left: 25rem">
            <div class="row" style="margin-bottom: 2rem">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php?param=profileDetails">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php?param=">Wink <span
                                    class="badge badge-pill badge-light">1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php?param=">Messages <span
                                    class="badge badge-pill badge-light">1</span></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 align-self-end">
                    <?php
                    if (isset($_GET['param'])) {
                        switch ($_GET['param']){
                            case 'profileDetails':
                                require_once "profileDetails.php";
                                break;
                            case 'wink' :
                                //
                                break;
                            case 'messages':
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row profile-bg position-relative"></div>-->
</div>
</body>
</html>
