<?php

require __DIR__.'\boot.php';

use Hotel\Room;
use Hotel\RoomType;

// Initialize Room service
$room = new Room();

$roomType = new RoomType();

// Get page parameters (from index.php)
// $cityGet = $_GET['city'];
// $roomTypeGet = (int)$_GET['room'];
// $checkInGet = $_GET['checkin'];
// $checkOutGet = $_GET['checkout'];


$room->getTwo();die;

// Room search
$availableRooms = $room->searchRooms($checkInGet, $checkOutGet, $cityGet, $roomTypeGet);

// Count of guests
$countOfGuests = $room->getCountOfGuests();

// Room Type
$types = $roomType->getTypes();

// Cities
$cities = $room->getCities();



?>


<!Doctype html>
<html>
  <head>
    <title>Search Results</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="assets/css/stylesList.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/all.min.css" rel="stylesheet"/>
  </head>
  <body>
    <header> 
        <p class="title-header">Hotels</p>
        <div class="title-menu-list">
          <ul>
            <li class="page-home">
              <a href="index.php" target="_blank">
                <!-- <img src="assets\icons\home.png"/> -->
                <i class="fas fa-home"></i>
                Home
              </a>
            </li>
            <li class="page-profile">
              <a href="login.php" target="_blank">
                <i class="fas fa-user"></i>
                Profile
              </a>
            </li>
          </ul>
        </div>
    </header>
    <main>
      <aside class="filter-search">
        <h1>FIND THE PERFECT HOTEL</h1>
        <form method="GET" action="list.php">
          <label for="guests">Count of Guests</label>
          <select is="guests" name="guests" value="<?php echo $city;?>">
          <option value="0">Count of Guests</option>

          <!-- PHP: Count of guests  -->
          <?php
            foreach($countOfGuests as $guest){
          ?>
            <option value="<?php echo $guest['count_of_guests'];?>">
              <?php 
                echo $guest['count_of_guests'];
              ?>
            </option>
          <?php
            }
          ?>
          </select>
          <br>
          <label for="room">Room Type</label>
          <select is="room" name="room">

          <option value="0">Room Type</option>
            <!-- PHP: Get room type -->
            <?php 
                foreach ($types as $type){

                  // Selected values should be user's input, otherwise default value
                  $isSelected = "";
                  $roomTypeGet == $type['type_id']? $isSelected = "selected" : $isSelected = "";  
              ?>
                 <!-- PHP:  Define selected value and print options -->
                  <option value="<?php echo $type['type_id']?>"<?php echo " ",$isSelected?>> 
                    <?php 
                      echo $type['title'];
                    ?>
                  </option>
              <?php
                }
              ?>
             <!-- PHP: Get room types - DONE -->
          </select>
          <br>
          <label for="city">City</label>
          <select is="city" name="city">
            <option value="0">City</option>
            <!-- PHP: Get cities -->
            <?php 
                foreach ($cities as $city){
                  // Selected values should be user's input, otherwise default value
                  $isSelected = "";
                  $cityGet == $city? $isSelected = "selected" : $isSelected = "";
              ?>
                  <option value="<?php echo $city?>"<?php echo " ",$isSelected?>> 
                    <?php 
                      echo $city;
                    ?>
                  </option>
                <?php
                  }
                ?>
             <!-- PHP: Get cities - DONE -->
          </select>
          <br>
          <input type="text" name="price" id="price" placeholder="Enter maximum price"/>
          <br>
          <br>
          <label for="checkin">Check-in Date:</label>
          <input type="date" id="checkin" name="checkin" value="<?php echo $checkInGet;?>"/>
          <br>
          <br>
          <label for="checkout">Check-out Date:</label>
          <input type="date" id="checkout" name="checkout" value="<?php echo $checkOutGet;?>"/>
          <br>
          <input type="submit" value="FIND HOTEL">
        </form>
      </aside>
      <div class="search-results">
        <h1>Search Results</h1>

        <!-- PHP: Show available listings  -->
        <?php
          foreach($availableRooms as $room){
        ?>

          <div class="listing">
            <aside class="img-aside">
            <img src="assets\rooms\<?php echo $room['photo_url']?>"/>
          </aside>
          <div class="listing-description">
            <h2><?php echo $room['name'] ?></h2>
            <h3><?php echo $room['city'] , ", ", $room['area'] ?></h3>
            <p><?php echo $room['description_short'] ?></p>
            <a href="" target="_blank">Go to Room Page</a>
          </div>
        </div>

        <?php
          }
        ?>
      </div>
    </main>
    <footer>
        <p> &#169; collegelink 2018</p>
    </footer>
  </body>

</html>
