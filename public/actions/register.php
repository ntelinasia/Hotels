<?php
// Boot application
require_once __DIR__.'\..\..\boot\boot.php';

use Hotel\User;

// Return to Home page if a POST request
if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
    print("Redirecting...");
    // header('Location:../../index.php');
    
}else{
    print("Can't redirect....");
    print(strtolower($_SERVER['REQUEST_METHOD']));
    return;
}

// Create new User
$user = new User();
$user->insert($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password']);

// Retrieve user
$userInfo = $user->getByEmail($_REQUEST['email']);

// Generate token (cookie)
$token = $user->generateToken($userInfo['user_id']);
// Set cookie
setcookie('user_token', $token, time() + (30 * 24 * 60 * 60), '/'); // expiration time is present time + 30 days from now, which is 30 days * 24 hours * 60 minutes * 60 seconds
// Return to Home Page
header('Location:../../index.php');


