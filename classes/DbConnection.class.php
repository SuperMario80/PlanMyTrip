<?php

declare(strict_types=1);

class DbConnection {
    
    //USING SINGLETON PATTERN
    private static $instance;   // : DbConnection
    
    public static function getInstance(): DbConnection {
        if (self::$instance == null) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }
    // ENDO OF SINGLETON DECLARATION
    
    

    private PDO $connection;
    private int $value;

    private function __construct() {
        //
        // CONNECTION PARAMETERS
        $host = 'localhost';       
        $user = 'PlanMyTrip';
        $pass = 'planmytrip';             
        $db = 'planmytrip';

        // DATA SET NAME - DB SPECIFIC
        // //CONNECTION TO MariaDB DATABASE  USING PDO
        $dsn = "mysql:host=$host;dbname=$db";
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];
        $this->connection = new PDO($dsn, $user, $pass, $options);
        
    }
    
    function getConnection(): PDO {
        return $this->connection;
    }

    function getValue(): int {
        return $this->value;
    }

}