<?php require "includes/db.php";
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <div class="container-fluid">
      <div class="card-container">
        <div class="section left">
          <div class="heading"><h2>Bulletin Board System</h2></div>
          <img src="images/maroon.svg" class="wave" />
          <img
            src="images/citcs-undraw_website_builder_re_ii6e.svg"
            class="girl"
          />
        </div>
        <form action="includes/register-inc.php" method="POST">
          <div class="section right">
            <!-- <img src="/images/citcs-wavy1-top.svg" class="bg-right-top" /> -->

            <img src="images/citcs-wavyyyyyy.svg" alt="" class="bg-right" />
            <div class="heading">
              <h2>Sign Up</h2>
              <p>Join us!</p>
            </div>
            <!-- CHECK IF ERROR -->
            <?php if (isset($_SESSION["error"])) {?>
            <div class="alert">
              <small><?php echo $_SESSION["error"]; ?></small>
            </div>
              <?php unset($_SESSION["error"]);}?>
              <!-- CHECK IF SQL ERROR -->
              <?php if (isset($_SESSION["sql"])) {?>
              <?php echo "<script>alert($_SESSION[sql])</script>" ?>
            <?php unset($_SESSION["error"]);}?>
            <?php if (isset($_SESSION["success"])) {?>
              <div class="alert">
              <small><?php echo $_SESSION["success"]; ?></small>
            </div>
            <?php unset($_SESSION["success"]);}?>
            <div class="form-group">
            <i class="fa fa-user"></i>
              <input
                type="text"
                name="fname"
                placeholder="First name"
              />
            </div>
            <div class="form-group">
            <i class="fa fa-user"></i>
              <input
                type="text"
                name="lname"
                placeholder="Last name"
              />
            </div>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <input
                type="text"
                name="username"
                placeholder="Enter username"
                autocomplete="off"
                id="username"
                maxlength="8"
              />
            </div>
            <div class="form-group">
              <i class="fa fa-key"></i>
              <input
                type="password"
                name="password"
                placeholder="Enter password"
              />
            </div>
            <div class="form-group">
              <i class="fa fa-key"></i>
              <input
                type="password"
                name="confirmPassword"
                placeholder="Confirm password"
              />
            </div>
            <button type="submit" name="signup">Sign Up</button>
            <div class="sign-up-section">
              <a href="login.php">Login here</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
