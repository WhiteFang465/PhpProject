<html>
<?php require_once "./../includes/header.php";

$demoProfile = [
    ["name" => "Aiony Haust", "age" => "24", "imgSrc" => "aiony-haust.jpg", "gender" => "Female"],
    ["name" => "Aleksandr Minakov", "age" => "25", "imgSrc" => "aleksandr-minakov.jpg", "gender" => "female"],
    ["name" => "Alexander Hipp", "age" => "20", "imgSrc" => "alexander-hipp.jpg", "gender" => "Male"],
    ["name" => "Amir Mohammad", "age" => "26", "imgSrc" => "amir-mohammad.jpg", "gender" => "Male"],
    ["name" => "Christian Buehner", "age" => "25", "imgSrc" => "christian-buehner.jpg", "gender" => "Male"],
    ["name" => "Christina Wocintechchat", "age" => "19", "imgSrc" => "christina-wocintechchat.jpg", "gender" => "Female"],
    ["name" => "Courtney Cook", "age" => "28", "imgSrc" => "courtney-cook.jpg", "gender" => "Female"],
    ["name" => "Craig Mckay", "age" => "24", "imgSrc" => "craig-mckay.jpg", "gender" => "Female"]
]
?>
<body>
<div id="parent_div">
    <?php require_once "../includes/navbar.php"; ?>
    <div class="banner">
        <div id="banner-image">
            <div class="container">
                <div id="banner_content">
                    <form class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Looking For</label>
                            <select class="form-select form-select-sm col-sm-6" name="looking_for_select">
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                                <option value="3">Bi-Sexual</option>
                                <option value="4">Gay</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">From Age</label>
                            <input type="number" class="form-control col-sm-6" name="min_age" placeholder="Minimum Age">
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">To Age</label>
                            <input type="number" class="form-control col-sm-6" name="max_age" placeholder="Maximum Age">
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
    </div>
    <div class="profiles_for_guest">
        <div class="profiles_holder">
            <?php
            foreach ($demoProfile as $key) {
                ?>
                <div class="profiles_for_guest_container">
                    <img src="../images/Profile_Pictures/<?= $key['imgSrc'] ?>" alt="<?= $key['name'] ?>"
                         class="profiles_for_guest_image">
                    <div class="profiles_for_guest_middle">
                        <div><h5>Name : <?= $key['name'] ?> </h5>
                            <h5>Age : <?= $key['age'] ?></h5>
                            <h5>Gender : <?= $key['gender'] ?></h5>
                            <button class="btn">Connect</button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="footer_body">

        </div>
    </div>
</div>
</body>
</html>
