<?php

namespace Hotel;

use PDO;
use Support\Configuration;
use Hotel\BaseService;

// Signing key - constant    
define("TOKEN_KEY", "randomiz3dToken!Create-newKey!");

class User extends BaseService{
    // Session
    private static $currentUseId;

    // A list with all users in database
    public function getList(){
        return BaseService::fetchAll('SELECT * FROM user');
    }

    public function getByEmail($email){
        $parameters = [
            ':email' => $email,
        ];
        $userInfo = BaseService::fetch('SELECT * FROM user WHERE email=:email', $parameters);
        return $userInfo;
    }

    // Insert user in database
    public function insert($name, $email, $password){

        // Prepare statement
        $statement = $this->getPdo()->prepare('INSERT INTO user(name, email, password) VALUES (:name, :email, :password)');
        
        // Create values and bind
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        // use hashed password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        $rows = $statement->execute();

        return $rows==1;
    }

    public function verifyUser($email, $password){
        // Retrieve user
        $user = $this->getByEmail($email);
        // Verify password given with hashed database password
        return password_verify($password,$user['password']); //boolean 
    }

    public static function getCurrentUserId(){
        return self::$currentUseId;
    }
    public static function setCurrentUserId($userId){
        self::$currentUseId = $userId;
    }

    public function verifyToken($token){
        // Get payload
        $payload = $this->getTokenPayload($token);
        $userId = $payload['user_id'];
        // Generate new token, tokens should be identical
        return $this->generateToken($userId)==$token;
    }
    // Create tokens to keep user connection alive
    public function generateToken($userId){
        // Create token payload
        $payload = [
            'user_id'=> $userId,
        ];
        $payloadEncoded = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $payloadEncoded, TOKEN_KEY);
        return sprintf('%s,%s', $payloadEncoded, $signature);
    }

    // Convert token into an array
    public function getTokenPayload($token){
        // Get payload signature
        [$payloadEncoded] = explode(',',$token);
        // Get payload
        return json_decode(base64_decode($payloadEncoded), true);
    }
}   