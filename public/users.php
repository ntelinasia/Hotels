<?php

require_once __DIR__.'/../autoload.php';
use Hotel\User;

$user = new User();
$list = $user->getList();
// $ins=$user->insert('Nasia', 'lalala@gmail.com', '1234567');
// var_dump($ins);

$verified = $user->verifyUser('lalala@gmail.com', '1234567');
var_dump($verified);

// print_r($list);

