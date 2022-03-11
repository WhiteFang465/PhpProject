<!doctype html>
<html lang="en">
<?php
require_once "./../includes/header.php";

require_once "./../Database/Model/Entities/userOperations.php";
require_once "./../Database/Model/Entities/user.php";
$user=false;
//$_POST['id']=4;
if(isset($_REQUEST['id']) && strlen($_REQUEST['id'])>0) {
    $_SESSION['id'] = $_REQUEST['id'];
    $user = $userTable->getUserByID($_REQUEST['id']);
}

?>
<body>
<div class="table-responsive">
<div class="card">
    <div class="card-body">
        <h4 class="mb-3"><b>Details</b></h4>
        <table class="table table-data">
            <tbody>
            <tr>
                <td style="width: 20% !important;">Name</td>
                <td> <?php echo $user->getFirstName() . " ". $user->getLastName() ?> </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><?php echo $user->getAge() ?></td>
            </tr>
            <tr>
                <td>I am a</td>
                <td><?php
                    switch ($user->getGender()) {
                        case 'M':
                            echo "Male";
                        break;
                        case 'F':
                            echo "Female";
                            break;
                        case 'O':
                            echo "NA";
                            break;
                    }
                     ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
