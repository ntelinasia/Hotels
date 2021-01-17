<?php

namespace Support;

class Configuration{

    private $config;

    private static $instance;
    
    private function __construct(){
        // Set path to file
        $filePath = __DIR__.'\..\..\config\config.json';
        // Load file
        $fileContents = file_get_contents($filePath);
        $this->config = json_decode($fileContents, true);
    }

    public static function getInstance(){
        self::$instance = self::$instance ?: new Configuration();
        return self::$instance;
    }

    public function getConfig(){
        return $this->config;
    }

}