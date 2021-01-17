<?php
require __DIR__.'\boot.php';

use Hotel\Room;
use Hotel\RoomType;

// Get cities
$room = new Room();
$cities = $room->getCities();

// Get room types
$roomType = new RoomType();
$types = $roomType->getTypes();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,  initial-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="assets/css/stylesIndex.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/all.min.css" rel="stylesheet"/>
    <script src="Scripts/indexApp.js"></script>
  </head>
  <body >
    <header> 
        <p class="title-header">Hotels</p>
        <div class="title-menu-list">
          <ul>
            <li class="page-home">
              <a href="index.php" target="">
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
      <div class="container">
        <form action="list.php" id="search-form">
          <div class="date-input">
              <label for="city">City</label>
              <select is="city" name="city">
              <option value="0">City</option>

              <!-- PHP: Get cities -->
              <?php 
                foreach ($cities as $city){
              ?>
                  <option value="<?php echo $city?>"> 
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
              <label for="room">Room Type</label>
              <select is="room" name="room">
              <option value="0">Room Type</option>

              <!-- PHP: Get room type -->
              <?php 
                foreach ($types as $type){
              ?>
                  <option value="<?php echo $type['type_id']?>"> 
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
              <label for="checkin">Check-in Date:</label>
              <input type="date" id="checkin" name="checkin">
              <div class="checkin-error-message no-display">
                *Provide Check-In Date
              </div>
              <br>
              <label for="checkout">Check-out Date:</label>
              <input type="date" id="checkout" name="checkout">
              <div class="checkout-error-message no-display">
                *Provide Check-Out Date
              </div>
            </div>
            <br>
            <div class="submit-button">
              <input type="submit" value="Search">
            </div>
        </form>
      </div>
    </main>
    <footer>
      <p> &#169; collegelink 2018</p>
    </footer>
    
  </body>
</html>
