<?php
// This class has functions that are common for classes in Hotel namespace

namespace Hotel;

use PDO;
use DateTime;
use Support\Configuration;

class BaseService{

    // Database connection
    private static $pdo;

    public function __construct(){
        $this->initializePdo();
    }
    protected function initializePdo(){
        // Check if PDO is already initialized - already connected to database
        if(!empty(self::$pdo)){
            return;
        }

        // Load database onfigurations
        $config = Configuration::getInstance();
        $databaseConfig = $config->getConfig()['database'];

        // Connect to database
        self::$pdo = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=UTF8', $databaseConfig['host'], $databaseConfig['dbname']), $databaseConfig['username'], $databaseConfig['password'], [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]
        );
    }
    protected function getPdo(){
        return self::$pdo;
    }

    protected function fetchAll($sql, $parameters = [], $type = PDO::FETCH_ASSOC){
        $statement = $this->getPdo()->prepare($sql);
        
        // Bind parameters
        foreach($parameters as $key => $value){
            if($param = is_int($value)){
                $param=PDO::PARAM_INT;
            }else{
                $param=PDO::PARAM_STR;
            }
            // $param = is_int($value) ? PDO::PARAM_INT: PDO::PARAM_STR;
            $statement->bindParam($key, $value, $param);
        }
        // Execute
        $statement->execute();
        // Fetch All
        return $statement->fetchAll($type);
        
    }

    protected function fetch($sql, $parameters = [], $type = PDO::FETCH_ASSOC){
        // Prepare statement
        $statement = $this->getPdo()->prepare($sql);
        // Bind parameters
        foreach($parameters as $key => $value){
            // Check if numeric or string
            $statement->bindParam($key, $value, is_int($value) ? PDO::PARAM_INT: PDO::PARAM_STR);
        }
        // Execute
        $statement->execute();
        // Fetch All
        return $statement->fetch($type);
    } 
}

