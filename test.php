<?php
require_once __DIR__.'\boot.php';

use Hotel\Room;
// use Hotel\User;
// use Support\Configuration;
// use DateTime;

// $conf=Configuration::getInstance();
// var_dump($conf);
// $databaseConfig = $conf->getConfig()['database'];
// print_r($databaseConfig);


// $room = new Room();
// $user = new User();
// $userRecord = $user->getByEmail('ntelinasia2@gmail.com');
// print_r($userRecord);

$room = new Room();
// $rows = $room->searchRooms('Athens', 2, new DateTime('2020-12-31'), new DateTime('2021-01-01'));
$rows = $room->searchRooms('Athens', 2,'2020-12-31', '2021-01-01');
print_r($rows);
