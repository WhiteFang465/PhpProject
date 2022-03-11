<?php


require_once "user.php";

require_once "database.php";

class UserTable extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(User $user)
    {
        $query = "insert into user (first_name, last_name, gender, age, email, password, mobile_number, premium, smokes, drinks) VALUES (?, ?, ?, ?,?,?,?,?,?,?)";
        $values = [$user->getFirstName(), $user->getLastName(), $user->getGender(),$user->getAge() ,  $user->getEmail(), $user->getPassword(), $user->getMobileNumber(),$user->isPremium(),$user->isSmokes(), $user->isDrinks()];
        $idOfRow = $this->executeInsert( $query, $values);
        $user->setId($idOfRow);
    }

    public function update(User $user) : void{
        $query = "update user SET first_name = ?, last_name = ?, gender=?, age=?, email = ?, password = ?, mobile_number=?, profile_pictures=?, images=?, premium=?, smokes=?, drinks=? where id = ?";
        $values = [$user->getFirstName(), $user->getLastName(), $user->getGender(),$user->getAge(), $user->getEmail(), $user->getPassword(), $user->getMobileNumber(), $user->getProfilePicture(), $user->getImages(), $user->isPremium(), $user->isSmokes(), $user->isDrinks(), $user->getId()];
        $this->execute($query, $values);
    }


    public function authenticate($username, $password) : User|false {
        $query = "select * from user where email=:email and password=:password";
        $values = ["email" => $username, "password"=> $password];
        $results = $this->execute($query, $values);

        if (!$results)
            return false;

        $row = $results[0];
        return new User($row['first_name'], $row['last_name'], $row['gender'],$row['age'], $row['email'], $row['password'], $row['mobile_number'], $row['profile_pictures'], $row['images'], $row['premium'], $row['smokes'], $row['drinks'] , $row['id']);

    }
    public function authenticateUsernameAndPassword($username, $password): array
    {
        $query = "select * from user where email=:email and password=:password";
        $values = ["email" => $username, "password" => $password];
        $results = $this->execute($query, $values);

        if (!$results) {
            return [false];
        } else {
            $row = $results[0];

            return [new User($row['first_name'], $row['last_name'], $row['gender'],$row['age'], $row['email'], $row['password'], $row['mobile_number'], $row['profile_pictures'], $row['images'], $row['premium'], $row['smokes'], $row['drinks'] , $row['id'])];

        }



    }

    public function searchUserLike($searchString) : Array |false {
        $query = "select * from user where first_name like '" . $searchString. "%' ";
        //$values = ["searchString"=>$searchString];
        $results = $this->execute($query);

        if (!$results)
            return false;

        $searchLikeUsers=[];
        foreach ($results as $row) {
            array_push($searchLikeUsers, (new User($row['first_name'], $row['last_name'], $row['gender'], $row['age'], $row['email'], $row['password'], $row['mobile_number'], $row['profile_pictures'], $row['images'], $row['premium'], $row['smokes'], $row['drinks'], $row['id'])));
        }
        return $searchLikeUsers;
    }
    public function getAllUsers() : Array |false {
        $query = "select * from user";

        $results = $this->execute($query);

        if (!$results)
            return false;

        $getAllUsers=[];
        foreach ($results as $row) {
            array_push($getAllUsers, (new User($row['first_name'], $row['last_name'], $row['gender'], $row['age'], $row['email'], $row['password'], $row['mobile_number'], $row['profile_pictures'], $row['images'],  $row['premium'], $row['smokes'], $row['drinks'], $row['id'])));
        }
        return $getAllUsers;
    }
    public function getUsersByAgeAndGender($minAge, $maxAge, $gender) : Array |false {
        $query = "select * from user where gender like '". $gender."' and age between ".$minAge." and ".$maxAge;

        $results = $this->execute($query);

        if (!$results)
            return false;

        $getAllUsers=[];
        foreach ($results as $row) {
            array_push($getAllUsers, (new User($row['first_name'], $row['last_name'], $row['gender'], $row['age'], $row['email'], $row['password'], $row['mobile_number'], $row['profile_pictures'], $row['images'], $row['premium'], $row['smokes'], $row['drinks'], $row['id'])));
        }
        return $getAllUsers;
    }

}

$userTable = new UserTable();

//Authenticate
//var_dump($userTable->authenticate("c", "d"));