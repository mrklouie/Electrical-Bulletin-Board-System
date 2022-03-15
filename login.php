<?php require "includes/db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
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
         <img src="images/citcs-wavy1.svg" class="wave" />
          <img
            src="images/citcs-undraw_website_builder_re_ii6e.svg"
            class="girl"
          />
        </div>
        <form action="includes/login-inc.php" method="POST">
          <div class="section right">
          <img src="images/citcs-wavyyyyyy.svg" alt="" class="bg-right" />
            <div class="heading">
              <h2>Hello Again</h2>
              <p>Welcome back</p>
            </div>
            <!-- CHECK IF ERROR -->
            <?php if (isset($_SESSION["error"])) {?>
            <div class="alert">
              <small><?php echo $_SESSION["error"]; ?></small>
            </div>
            <?php unset($_SESSION["error"]);}?>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <input
                type="text"
                name="username"
                placeholder="Enter username"
                autocomplete="off"
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
            <button type="submit" name="login">Login</button>
            <a href="reset-req.php" class="forgot-pass">Forgot Password?</a>
            <div class="sign-up-section">
              <a href="register.php">Sign up here</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
