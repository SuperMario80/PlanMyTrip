<?php

declare(strict_types=1);

class DbConnection {
    
    // Die Klasse DbConnection soll Singleton werden
    private static $instance;   // : DbConnection
    
    public static function getInstance(): DbConnection {
        if (self::$instance == null) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }
    // hier endet die Singelton-Deklaration
    
    

    private PDO $connection;
    private int $value;

    private function __construct() {
        //
        // Verbindungsparamter
        $host = 'localhost';       
        $user = 'PlanMyTrip';
        $pass = 'planmytrip';             
        $db = 'planmytrip';

        // 
        // Data Set Name - Db-System-Spezifisch
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