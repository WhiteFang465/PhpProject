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

    protected function __construct()
    {
        try {
            $this->connection = new PDO(Database::connectionString, self::username, Database::password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection FAiled: {$exception->getMessage()}";
        }
    }

    protected function executeInsert(String $query, Array $values = null) : Int|false {
        $stmt = $this->connection->prepare($query );
        $stmt->execute($values);

        return $this->connection->lastInsertId();
    }

    protected function execute(String $query, Array $values = null) : Array|false {
        $stmt = $this->connection->prepare($query );
        $stmt->execute($values);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}

//$db = new Database();
//$query = "Select * from user where first_name like :fname and last_name like :lname";
//$values = ["lname"=>"Mad", "fname" => "reza" ];
//$results = $db->execute($query, $values);
//if ($results != false) {
//    foreach ($results as $row) {
//        echo "Full Name: $row[first_name], $row[last_name] <br />";
//    }
//}
//