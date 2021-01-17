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
    <title>Register</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="assets\css\all.min.css" type="text/css" rel="stylesheet"/>
    <link href="assets\css\stylesRegister.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <script src="Scripts\registerApp.js"></script>
  </head>
  <body >
    <header>
      <p class="title-header">Hotels</p>
      <div class="title-menu-list">
        <ul>
          <li class="page-home">
            <a href="index.html" target="_blank">
              <!-- <img src="assets\icons\home.png"/> -->
              <i class="fas fa-home"></i>
              Home
            </a>
          </li>
          <li class="page-profile">
            <a href="" target="_blank">
              <i class="fas fa-user"></i>
              Profile
            </a>
          </li>
        </ul>
      </div>
    </header>
    <main>
      <!-- Register Form -->
      <form style="display: inherit;" action="public\actions\register.php" method="POST">
        <div class="register-form form-group">
          <h1> Create User</h1>
          <label for="name">Name<span style="color:red">*</span>:</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="John Doe"/>
          <div style="text-align: left; font-size:12px;" class="name-error-message text-danger email-error d-none">
            *Provide name
          </div>
          <label for="email">Email address<span style="color:red">*</span>:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com"/>
          <div style="text-align: left; font-size:12px;" class="email-error-message text-danger email-error d-none">
            *Wrong email
          </div>
          <label for="email">Repeat email address<span style="color:red">*</span>:</label>
          <input type="email" class="form-control" id="emailr" placeholder="example@mail.com"/>
          <div style="text-align: left; font-size:12px;" class="emailr-error-message text-danger email-error d-none">
            *Wrong email
          </div>
          <label for="pwd">Password<span style="color:red">*</span>:</label>
          <br>
          <input type="password" id="password" name="password" class="form-group form-control" placeholder="Password">
          <div style="text-align: left; font-size:12px;" class="password-error-message text-danger email-error d-none">
            *Password should be at least 8 characters
          </div>
        </div>
        <div class="submit-button">
          <input type="submit" value="Sign Up">
        </div>
      </form> 
    </main>
    <footer>
        <p> &#169; collegelink 2018</p>
    </footer>


    </body>
</html>