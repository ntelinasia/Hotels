<?php
// Boot application
require_once __DIR__.'/../../autoload.php';

use Hotel\User;

// Go to Home Page ig GET request
if(strtolower($_SERVER['REQUEST_METHOD'])== 'get'){
    print("Redirecting...");
    header('Location:../../profile.php');
    // return;
}else{
    print("Can't redirect....");
    print(strtolower($_SERVER['REQUEST_METHOD']));
}

// Create new User
$user = new User();
// Retrieve user from database
$exists = $user->verifyUser($_REQUEST['email'], $_REQUEST['password']);
// if($exists){

// }
