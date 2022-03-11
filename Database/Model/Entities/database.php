<?php

class Database {
    private const serverName = "localhost";
    private const port = 3306;
    private const database = "dating_app_model";
    private const username = "dating_admin";
    private const password = "root";
    private const connectionString = "mysql:host=" . self::serverName .
    ";dbname=" . Database::database . ";port=" . self::port;
    private PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(Database::connectionString, self::username, Database::password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection FAiled: {$exception->getMessage()}";
        }
    }

    public function executeInsert(String $query, Array $values = null) : Int|false {
        $stmt = $this->connection->prepare($query );
        $stmt->execute($values);

        return $this->connection->lastInsertId();
    }

    public function execute(String $query, Array $values = null) : Array|false {
        $stmt = $this->connection->prepare($query );
        $stmt->execute($values);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function  getData(int $id) : Array|false{
        $query = "select * from user where id like :id";
        $values = ["id"=>$id];
        return $this->execute($query,$values);
    }

    public function getName(int $id) :string {
        $firstName = $this->getData($id);
        return $firstName[0]['first_name'];
    }

    public function  getImageURL(int $id) :string{
        $imgURL = $this->getData($id);
        return $imgURL[0]['images'];
    }

}
//
//$db = new Database();
//$query = "Select * from user where first_name like :fname and last_name like :lname";
//$values = ["lname"=>"Mad", "fname" => "reza" ];
//$results = $db->execute($query, $values);
//if ($results != false) {
//    foreach ($results as $row) {
//        echo "Full Name: $row[first_name], $row[last_name] <br />";
//    }
//}
