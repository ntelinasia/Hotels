<?php
require_once __DIR__.'\boot.php';
use Hotel\User;

// Checked for existed logged in user
if(!empty(User::getCurrentUserId())){
  header('Location:/Hotels/index.php');
  var_dump("Redirecting...");
  die;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="robots" content="noindex, nofollow"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="assets/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link href="assets/css/stylesRegister.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body >
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
            <!-- LogIn Form -->
            <form style="display: inherit;" action="public\actions\login.php" method="GET" >
              <div class="register-form form-group">
                <h1> Sign In</h1>
                <label for="email">Email address<span style="color:red">*</span>:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com">
                <label for="pwd">Password<span style="color:red">*</span>:</label>
                <br>
                <input type="password" name="password" class="form-group form-control" placeholder="Password">
              </div>
              <div class="submit-button">
                <input type="submit" value="Log In">
              </div>
            </form>
          
        </main>
        <footer>
            <p> &#169; collegelink 2018</p>
        </footer>


    </body>
</html>